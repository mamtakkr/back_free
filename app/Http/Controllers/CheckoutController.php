<?php


namespace App\Http\Controllers;

use App\Models\Plan;
use App\Models\User;
use App\Models\Subscription;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Stripe;
use Auth;
use Session; 
use GuzzleHttp\Client as HttpClient;
use Illuminate\Support\Facades\Crypt;
use DB;

class CheckoutController extends Controller
{


    public function index($data)
    {
	
	}
    
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function createSubscribe($id)
    {
        $plan = Plan::findOrFail(Crypt::decrypt($id));
	    return view('subscriptions.payment_type',compact('plan'));
// 		$userInfo = Auth::user();
// 		$countries = DB::table('countries')->get();
//         return view('auth.subscribe',compact('userInfo','countries','id'));
    }
	
	
	/**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function storeSubscribe($id,Request $request)
    {
		$userInfo = Auth::user();
		
        $plan = Plan::where('id', '=', $id)->firstOrFail();

        // If the user is already subscribed to the plan
        if ($userInfo->plan_id == $plan->id) {
            return redirect()->route('profile-settings');
        }
		
		$userInfo->payment_type = $request->input('payment_type');
// 		$userInfo->city = $request->input('city');
// 		$userInfo->country = $request->input('country');
// 		$userInfo->postal_code = $request->input('postal_code');
// 		$userInfo->state = $request->input('state');
// 		$userInfo->address = $request->input('address');
// 		$userInfo->billing_name = $request->input('billing_name');
// 		$userInfo->billing_phone = $request->input('billing_phone');
        $userInfo->save();
        
        
        

        // Get the total amount to be charged
        $amount = $plan->price;

		//dd($request->all());
      	if ($request->input('payment_type') == 'stripe') {
            return $this->initStripe($request, $plan, $amount,$userInfo);
        } elseif ($request->input('payment_type') == 'paypal') {
            return $this->initPayPal($request, $plan, $amount,$userInfo);
        }

    }
    
	
	
	
	/**
     * Initialize the Stripe payment.
     *
     * @param Request $request
     * @param Plan $plan
     * @param $taxRates
     * @param $amount
     * @return \Illuminate\Contracts\Foundation\Application|Factory|RedirectResponse|View
     */
    private function initStripe(Request $request, Plan $plan, $amount, $userInfo)
    {
        
        // $stripe = new \Stripe\StripeClient(
        //     get_payment_setting('stripe_secret')
        // );
        
        $stripe = new \Stripe\StripeClient(
            env('STRIPE_SECRET')
        );
        

        // Attempt to retrieve the product
        try {
            $stripeProduct = $stripe->products->retrieve($plan->id);
// dd($stripeProduct->name);
            // Check if the plan's name has changed
            if ($plan->name != $stripeProduct->name) {

                // Attempt to update the product
                try {
                    $stripeProduct = $stripe->products->update($stripeProduct->id, [
                        'name' => $plan->name
                    ]);
                } catch (\Exception $e) {
                    return back()->with('error', $e->getMessage());
                }
            }
        } catch (\Exception $e) {
            // Attempt to create the product
            try {
                $stripeProduct = $stripe->products->create([
                    'id' => $plan->id,
                    'name' => $plan->name,
                    'description' => $plan->description
                ]);
            } catch (\Exception $e) {dd($e);
                return back()->with('error', $e->getMessage());
            }
        }
        
        $stripeAmount = $amount * 100;

        $stripePlan = $plan->id . '_' .$plan->plan_interval. '_' . $stripeAmount . '_' . env('STRIPE_CURRENCY');

        // Attempt to retrieve the plan
        try {
            $stripePlan = $stripe->plans->retrieve($stripePlan);
        } catch (\Exception $e) {
            // Attempt to create the plan
            try {
                $stripePlan = $stripe->plans->create([
                    'amount' => $stripeAmount,
                    'currency' => env('STRIPE_CURRENCY'),
                    'interval' => $plan->plan_interval,
                    'product' => $stripeProduct->id,
                    'id' => $stripePlan,
                ]);
            } catch (\Exception $e) {
                return back()->with('error', $e->getMessage());
            }
        }
        // Attempt to create the checkout session
        try {
            $stripeSession = $stripe->checkout->sessions->create([
                'success_url' => route('checkout.complete'),
				//'success_url' => url('/')."checkout/complete?session_id={CHECKOUT_SESSION_ID}",
				
                'cancel_url' => route('checkout.cancelled'),
                'payment_method_types' => ['card'],
                'line_items' => [
                    [
                        'price' => $stripePlan->id,
                        'quantity' => 1,
                    ],
                ],
                'mode' => 'subscription',
                'subscription_data' => [
                    // 'trial_period_days'=>1,
                    'metadata' => [
                        'user' => $userInfo->id,
                        'plan' => $plan->id,
                        'plan_amount' => $amount,
                        'amount' => $amount,
                        'currency' => env('STRIPE_CURRENCY'),
                        'interval' => $plan->plan_interval,
                    ],
                ],
            ]);
			
			Session::put('pay_subscription',$stripeSession->id);
			
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
		
		Session::put('pay_user_id',$userInfo->id);
		Session::put('pay_plan_id',$plan->id);
		

        return view('auth.processors.stripe', ['stripeSession' => $stripeSession]);
		
    }
	
	
	
	/**
     * Initialize the PayPal payment.
     *
     * @param Request $request
     * @param Plan $plan
     * @param $taxRates
     * @param $amount
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    private function initPayPal(Request $request, Plan $plan, $amount, $userInfo) {
        $httpClient = new HttpClient();

        // $httpBaseUrl = 'https://'.(get_payment_setting('paypal_mode') == 'sandbox' ? 'api-m.sandbox' : 'api-m').'.paypal.com/';
        $httpBaseUrl = 'https://'.(env('PAYPAL_MODE') == 'sandbox' ? 'api-m.sandbox' : 'api-m').'.paypal.com/';
        
        // Attempt to retrieve the auth token
        try {
            $payPalAuthRequest = $httpClient->request('POST', $httpBaseUrl . 'v1/oauth2/token', [
                    // 'auth' => [get_payment_setting('paypal_client_id'), get_payment_setting('paypal_secret')],
                    'auth' => [env('PAYPAL_CLIENT_ID'), env('PAYPAL_SECRET')],
                    
                    'form_params' => [
                        'grant_type' => 'client_credentials'
                    ]
                ]
            );

            $payPalAuth = json_decode($payPalAuthRequest->getBody()->getContents());
        } catch (BadResponseException $e) {
            return back()->with('error', $e->getResponse()->getBody()->getContents());
        }

        $payPalProduct = 'product_' . $plan->id;

        // Attempt to retrieve the product
        try {
            $payPalProductRequest = $httpClient->request('GET', $httpBaseUrl . 'v1/catalogs/products/' . $payPalProduct, [
                    'headers' => [
                        'Authorization' => 'Bearer ' . $payPalAuth->access_token,
                        'Content-Type' => 'application/json'
                    ]
                ]
            );

            $payPalProduct = json_decode($payPalProductRequest->getBody()->getContents());
        } catch (\Exception $e) {
            // Attempt to create the product
            try {
                $payPalProductRequest = $httpClient->request('POST', $httpBaseUrl . 'v1/catalogs/products', [
                        'headers' => [
                            'Authorization' => 'Bearer ' . $payPalAuth->access_token,
                            'Content-Type' => 'application/json'
                        ],
                        'body' => json_encode([
                            'id' => $payPalProduct,
                            'name' => $plan->name,
                            'description' => $plan->description,
                            'type' => 'SERVICE'
                        ])
                    ]
                );

                $payPalProduct = json_decode($payPalProductRequest->getBody()->getContents());
            } catch (BadResponseException $e) {
                return back()->with('error', $e->getResponse()->getBody()->getContents());
            }
        }

//dd($payPalProduct->id);
        $payPalAmount = $amount;

        $payPalPlan = 'plan_' . $plan->id . '_' .$plan->plan_interval . '_' . $payPalAmount . '_' . env('currency');
		
		
        // Attempt to create the plan
        try {
            $payPalPlanRequest = $httpClient->request('POST', $httpBaseUrl . 'v1/billing/plans', [
                    'headers' => [
                        'Authorization' => 'Bearer ' . $payPalAuth->access_token,
                        'Content-Type' => 'application/json'
                    ],
                    'body' => json_encode([
                        'product_id' => $payPalProduct->id,
                        'name' => $payPalPlan,
                        'status' => 'ACTIVE',
                        'billing_cycles' => [
                            [
                                'frequency' => [
                                    'interval_unit' => strtoupper($plan->plan_interval),
                                    'interval_count' => 1,
                                ],
                                'tenure_type' => 'REGULAR',
                                'sequence' => 1,
                                'total_cycles' => 0,
                                'pricing_scheme' => [
                                    'fixed_price' => [
                                        'value' => $payPalAmount,
                                        'currency_code' => strtoupper(env('STRIPE_CURRENCY')),
                                    ],
                                ]
                            ]
                        ],
                        
                        'payment_preferences' => [
                            'auto_bill_outstanding' => true,
                            'payment_failure_threshold' => 0,
                        ],
                    ])
                ]
            );

            $payPalPlan = json_decode($payPalPlanRequest->getBody()->getContents());
        } catch (BadResponseException $e) {
            return back()->with('error', $e->getResponse()->getBody()->getContents());
        }

        // Attempt to create the subscription
        try {
            $payPalSubscriptionRequest = $httpClient->request('POST', $httpBaseUrl . 'v1/billing/subscriptions', [
                    'headers' => [
                        'Authorization' => 'Bearer ' . $payPalAuth->access_token,
                        'Content-Type' => 'application/json'
                    ],
                    'body' => json_encode([
                        'plan_id' => $payPalPlan->id,
                        'application_context' => [
                            'brand_name' => env('APP_NAME'),
                            'locale' => 'en-US',
                            'shipping_preference' => 'SET_PROVIDED_ADDRESS',
                            'user_action' => 'SUBSCRIBE_NOW',
                            'payment_method' => [
                                'payer_selected' => 'PAYPAL',
                                'payee_preferred' => 'IMMEDIATE_PAYMENT_REQUIRED',
                            ],
                            'return_url' => route('checkout.complete'),
                            'cancel_url' => route('checkout.cancelled')
                        ],
                        'custom_id' => http_build_query([
                            'user' => $userInfo->id,
                            'plan' => $plan->id,
                            'plan_amount' => $amount,
                            'amount' => $amount,
                            'currency' => env('STRIPE_CURRENCY'),
                            'interval' => $plan->plan_interval,
                        ])
                    ])
                ]
            );
			
			Session::put('pay_user_id',$userInfo->id);
			Session::put('pay_plan_id',$plan->id);
			
            $payPalSubscription = json_decode($payPalSubscriptionRequest->getBody()->getContents());
			Session::put('pay_subscription',$payPalSubscription->id);
			
        } catch (BadResponseException $e) {
            return back()->with('error', $e->getResponse()->getBody()->getContents());
        }

        return redirect($payPalSubscription->links[0]->href);
    }
	
	
	
	/**
     * Display the Payment complete page.
     *
     * @return Factory|View
     */
    public function complete()
    {
		$pay_user_id = Session::get('pay_user_id');
		$pay_plan_id = Session::get('pay_plan_id');
		$pay_subscription = Session::get('pay_subscription');
		
		$plan = Plan::where('id',$pay_plan_id)->first();
		
		if($plan->plan_type=='monthly')
		{
		    $months = 1;
		}else{
		    $months = 12;
		}
		
        $ends_at = Carbon::now()->addMonths($months);
		
		$user = User::where('id',$pay_user_id)->first();
		$user->plan_id = $pay_plan_id;
		$user->subscribe_date = date('Y-m-d');
		$user->subscribe = 1;
		$user->stripe_id = $pay_subscription;
		$user->ends_at = $ends_at;
		$user->trial_ends_at = null;
		$user->save();
		
		
		Session::put('pay_user_id','');
		Session::put('pay_plan_id','');
		
        return view('auth.checkout.complete');
    }

    /**
     * Display the Payment pending page.
     *
     * @return Factory|View
     */
    public function pending()
    {
        return view('auth.checkout.pending');
    }

    /**
     * Display the Payment cancelled page.
     *
     * @return Factory|View
     */
    public function cancelled()
    {
		$pay_user_id = Session::get('pay_user_id');
		$pay_plan_id = Session::get('pay_plan_id');
		
		$user = User::where('id',$pay_user_id)->first();
		$user->plan_id = NULL;
		$user->subscribe_date = NULL;
		$user->subscribe = 0;
		$user->save();
		
        return view('auth.checkout.cancelled');
    }
	
	
	/**
     * Display the Unsubscribe.
     *
     * @return Factory|View
     */
    public function unsubscribe()
    {
		
		
		$user = User::where('id',Auth::user()->id)->first();
		if($user->user_type=='invite_user' && $user->payment_type=='' && $user->stripe_id == "")
		{
    		$user->plan_id = 3;
    		$user->subscribe = 0;
    		$user->save();
    		
            return redirect()->back()->with('error',__('public.subscription_cancelled'));
		    
		}
		else{
    		if($user->payment_type=='stripe' && $user->stripe_id != "")
    		{
    		$stripe = new \Stripe\StripeClient(
    		    get_payment_setting('stripe_secret')
            );
    		
    		
    		try {
                $stripeSession = $stripe->checkout->sessions->retrieve($user->stripe_id);
            } catch (\Exception $e) {
                return back()->with('error', $e->getMessage());
            }
    		
    		$subscription_id = $stripeSession->subscription;
    		
    		try {
                $response = $stripe->subscriptions->cancel(
                    $subscription_id,
                    ['prorate' => 'true']
                );
            } catch (\Exception $e) {
                return back()->with('error', $e->getMessage());
            }
    		//dd($response);	
    		}
    		else if($user->payment_type=='paypal')
    		{
    		$httpClient = new HttpClient();
    
            $httpBaseUrl = 'https://'.(get_payment_setting('paypal_mode') == 'sandbox' ? 'api-m.sandbox' : 'api-m').'.paypal.com/';
    		
    		
    		// Attempt to retrieve the auth token
            try {
                $payPalAuthRequest = $httpClient->request('POST', $httpBaseUrl . 'v1/oauth2/token', [
                        'auth' => [get_payment_setting('paypal_client_id'), get_payment_setting('paypal_secret')],
                        'form_params' => [
                            'grant_type' => 'client_credentials'
                        ]
                    ]
                );
    
                $payPalAuth = json_decode($payPalAuthRequest->getBody()->getContents());
            } catch (BadResponseException $e) {
                return back()->with('error', $e->getResponse()->getBody()->getContents());
            }
    		
    		
    		
    		
    		
    		try {
                $payPalSubscriptionRequest = $httpClient->request('POST', $httpBaseUrl . 'v1/billing/subscriptions/'.$user->stripe_id.'/cancel', [
                        'headers' => [
                            'Authorization' => 'Bearer ' . $payPalAuth->access_token,
                            'Content-Type' => 'application/json'
                        ],
                        'body' => json_encode([
                            'reason' => 'User requested for unsubscribe from website.',
                        ])
                    ]
                );
    			
                $payPalSubscription = json_decode($payPalSubscriptionRequest->getBody()->getContents());
    			
    			
    			
            } catch (BadResponseException $e) {
                return back()->with('error', $e->getResponse()->getBody()->getContents());
            }
    		
    		
    		
    		}	
    		
    		
    		
    		$user->plan_id = 3;
     		//$user->subscribe_date = NULL;
    		$user->subscribe = 0;
    		$user->stripe_id = NULL;
    		$user->save();
    		
    		//dd($payPalSubscription);
    		
            return view('auth.checkout.cancelled');
		}
    }
	
	
	
	
	
}