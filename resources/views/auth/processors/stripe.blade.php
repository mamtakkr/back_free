<x-guest-layout>
  <x-auth-card>
    <x-slot name="logo">
      <!--{{--<div class="auth_login"> <a href="{{route('index')}}"> 
      <img alt="" src="{{URL::to('/')}}/public/images/settings/{{get_setting('logo')}}" srcset="{{URL::to('/')}}/public/images/settings/{{get_setting('logo')}}" style="width: 60% !important; margin: 13px auto 0px !important;" > </a> </div>--}}-->
    </x-slot>
    <x-auth-validation-errors class="mb-4" :errors="$errors" />
	
	
	<h4>Redirecting...</h4>
	
    <script src="https://js.stripe.com/v3/"></script>

    <script>
        'use strict';

        // const stripe = Stripe("{{-- get_payment_setting('stripe_key') --}}");
        const stripe = Stripe("{{ env('STRIPE_KEY') }}");
        
        stripe.redirectToCheckout({
            sessionId: '{{ $stripeSession->id }}'
        });
    </script>
  </x-auth-card>
</x-guest-layout>