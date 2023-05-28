<?php



use Illuminate\Support\Facades\Route;



/*

|--------------------------------------------------------------------------

| Web Routes

|--------------------------------------------------------------------------

|

| Here is where you can register web routes for your application. These

| routes are loaded by the RouteServiceProvider within a group which

| contains the "web" middleware group. Now create something great!

|

*/



// Route::get('/', function () {

//     return view('welcome');

// });



// Route::get('/dashboard', function () {

//     return view('dashboard');

// })->middleware(['userRedirect'])->name('dashboard');



require __DIR__ . '/auth.php';

// Route::get('locale/{lange}', [App\Http\Controllers\LocalizationController::class, 'setLang']);

Route::get('lang/home', [App\Http\Controllers\LangController::class, 'index']);
Route::get('lang/change', [App\Http\Controllers\LangController::class, 'change'])->name('changeLang');

Route::group(['prefix' => '/', 'middleware' => ['activeUser']], function () {

	//without login routes
    Route::post('contact-store', [App\Http\Controllers\HomeController::class, 'contactStore'])->name('contact-store');
	Route::get('cronJob', [App\Http\Controllers\HomeController::class, 'cronJob']);
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('index');
    // Route::get('home', [App\Http\Controllers\HomeController::class, 'home'])->name('home');
    Route::post('ajax-get-city', [\App\Http\Controllers\HomeController::class, 'get_city'])->name('ajax-get-city');
    
    
// 	Route::get('test', [App\Http\Controllers\HomeController::class, 'test'])->name('test');
	Route::get('test', [App\Http\Controllers\IndexController::class, 'test'])->name('test');
	
    Route::get('subscriptions/{id}', [App\Http\Controllers\UserController::class, 'subscriptions'])->name('subscriptions');
    Route::get('payment-method/{id}', [App\Http\Controllers\CheckoutController::class, 'createSubscribe'])->name('payment-method');
    Route::post('subscribe/{id}', [App\Http\Controllers\CheckoutController::class, 'storeSubscribe'])->name('subscribe');
    
    
	Route::get('/checkout/cancelled', [App\Http\Controllers\CheckoutController::class, 'cancelled'])->name('checkout.cancelled');
    Route::get('/checkout/pending', [App\Http\Controllers\CheckoutController::class, 'pending'])->name('checkout.pending');
    Route::get('/checkout/complete', [App\Http\Controllers\CheckoutController::class, 'complete'])->name('checkout.complete');
	Route::POST('unsubscribe', [App\Http\Controllers\CheckoutController::class, 'unsubscribe'])->name('unsubscribe');
    
});

Route::group(['prefix' => '/', 'middleware' => ['activeUser','subscribeUser']], function () {
   
    //with login routes
	Route::get('visits', [App\Http\Controllers\IndexController::class, 'visits'])->name('visits');
	
    Route::get('members', [App\Http\Controllers\IndexController::class, 'members'])->name('members');
    Route::get('member-details/{id}', [App\Http\Controllers\IndexController::class, 'member_details'])->name('member-details');
	Route::post('member-search', [App\Http\Controllers\IndexController::class, 'memberSearch'])->name('member-search');
    
    Route::get('profile-edit/{id}', [App\Http\Controllers\ProfileController::class, 'profile_edit'])->name('profile-edit');
    Route::patch('profile-update', [App\Http\Controllers\ProfileController::class, 'profile_update'])->name('profile-update');
    Route::patch('pro-profile-update', [App\Http\Controllers\ProfileController::class, 'pro_profile_update'])->name('pro-profile-update');
	
	Route::get('events', [App\Http\Controllers\EventController::class, 'events'])->name('events');
	Route::get('fetchAllEvents', [App\Http\Controllers\EventController::class, 'fetchAllEvents'])->name('fetchAllEvents');
	Route::post('event-store', [App\Http\Controllers\EventController::class, 'eventStore'])->name('event-store');
	Route::post('event-search', [App\Http\Controllers\EventController::class, 'eventSearch'])->name('event-search');
	Route::get('event-details/{id}', [App\Http\Controllers\EventController::class, 'event_details'])->name('event-details');
    
	Route::get('messages/{id?}', [App\Http\Controllers\MessageController::class, 'messages'])->name('messages');
	Route::get('messages1/{id?}', [App\Http\Controllers\MessageController::class, 'messages1'])->name('messages1');
	Route::post('chat-action', [App\Http\Controllers\MessageController::class, 'chat_action'])->name('chat-action');
	Route::post('users-list', [App\Http\Controllers\MessageController::class, 'users_list'])->name('users-list');
	Route::post('show-chat', [App\Http\Controllers\MessageController::class, 'show_chat'])->name('show-chat');
	Route::post('update-user-chat', [App\Http\Controllers\MessageController::class, 'update_user_chat'])->name('update-user-chat');
	// Route::post('search-contact-msg', [App\Http\Controllers\MessageController::class, 'search_contacts'])->name('search-contact-msg');
	Route::get('search-contact-msg', [App\Http\Controllers\MessageController::class, 'search_contacts'])->name('search-contact-msg');
	
	Route::get('posts', [App\Http\Controllers\PostController::class, 'posts'])->name('posts');
	
	Route::get('fetchUserPosts', [App\Http\Controllers\PostController::class, 'fetchUserPosts'])->name('fetchUserPosts');
	
    Route::get('fetchAllPosts', [App\Http\Controllers\PostController::class, 'fetchAllPosts'])->name('fetchAllPosts');
	
	Route::get('fetchPost', [App\Http\Controllers\PostController::class, 'fetchPost'])->name('fetchPost');
    
    Route::post('post-store', [App\Http\Controllers\PostController::class, 'postStore'])->name('post-store');
    
    Route::post('like-store', [App\Http\Controllers\UserController::class, 'likeStore'])->name('like-store');
    
    Route::post('follow-store', [App\Http\Controllers\UserController::class, 'followStore'])->name('follow-store');
    
    Route::post('blacklist-store', [App\Http\Controllers\UserController::class, 'blacklistStore'])->name('blacklist-store');
    Route::get('blacklist-show/{id}', [App\Http\Controllers\UserController::class, 'blacklistShow'])->name('blacklist-show');
    Route::delete('blacklist-delete/{id}', [App\Http\Controllers\UserController::class, 'blacklistDelete'])->name('blacklist-delete');
    
    
    // Route::get('subscriptions/{id}', [App\Http\Controllers\UserController::class, 'subscriptions'])->name('subscriptions');
    // Route::get('payment-method/{id}', [App\Http\Controllers\CheckoutController::class, 'createSubscribe'])->name('payment-method');
    // Route::post('subscribe/{id}', [App\Http\Controllers\CheckoutController::class, 'storeSubscribe'])->name('subscribe');
    
    
// 	Route::get('/checkout/cancelled', [App\Http\Controllers\CheckoutController::class, 'cancelled'])->name('checkout.cancelled');
//     Route::get('/checkout/pending', [App\Http\Controllers\CheckoutController::class, 'pending'])->name('checkout.pending');
//     Route::get('/checkout/complete', [App\Http\Controllers\CheckoutController::class, 'complete'])->name('checkout.complete');
// 	Route::POST('unsubscribe', [App\Http\Controllers\CheckoutController::class, 'unsubscribe'])->name('unsubscribe');
    
    
    
    Route::post('participate-store', [App\Http\Controllers\EventController::class, 'participateStore'])->name('participate-store');
	Route::get('fetchParticipate', [App\Http\Controllers\EventController::class, 'fetchParticipate'])->name('fetchParticipate');
    Route::post('accept-store', [App\Http\Controllers\EventController::class, 'acceptStore'])->name('accept-store');
    Route::post('reject-store', [App\Http\Controllers\EventController::class, 'rejectStore'])->name('reject-store');
    
    
    Route::post('photo-store', [App\Http\Controllers\PhotoController::class, 'photoStore'])->name('photo-store');
    
    Route::get('fetchAllPhotos', [App\Http\Controllers\PhotoController::class, 'fetchAllPhotos'])->name('fetchAllPhotos');
    Route::get('fetchPubPhotos', [App\Http\Controllers\PhotoController::class, 'fetchPubPhotos'])->name('fetchPubPhotos');
    Route::get('fetchPriPhotos', [App\Http\Controllers\PhotoController::class, 'fetchPriPhotos'])->name('fetchPriPhotos');
    
    Route::post('video-store', [App\Http\Controllers\VideoController::class, 'videoStore'])->name('video-store');
    
    Route::get('fetchAllVideos', [App\Http\Controllers\VideoController::class, 'fetchAllVideos'])->name('fetchAllVideos');
    Route::get('fetchPubVideos', [App\Http\Controllers\VideoController::class, 'fetchPubVideos'])->name('fetchPubVideos');
    Route::get('fetchPriVideos', [App\Http\Controllers\VideoController::class, 'fetchPriVideos'])->name('fetchPriVideos');
    
    Route::post('comment-store', [App\Http\Controllers\PostController::class, 'commentStore'])->name('comment-store');
    
    Route::get('fetchAllComments', [App\Http\Controllers\PostController::class, 'fetchAllComments'])->name('fetchAllComments');
	
	Route::get('photos', [App\Http\Controllers\PhotoController::class, 'index'])->name('photos');
	Route::get('videos', [App\Http\Controllers\VideoController::class, 'index'])->name('videos');
	Route::get('userPosts', [App\Http\Controllers\PostController::class, 'userPosts'])->name('userPosts');
	
	
	Route::get('user-activity/{id}', [App\Http\Controllers\SecretController::class, 'userAct'])->name('user-activity');
	Route::get('user-photos/{id}', [App\Http\Controllers\SecretController::class, 'userPhotos'])->name('user-photos');
	
	
	Route::get('secrets', [App\Http\Controllers\SecretController::class, 'index'])->name('secrets');
	Route::get('secret-add/{id}', [App\Http\Controllers\SecretController::class, 'secretAdd'])->name('secret-add');
	Route::post('secret-store', [App\Http\Controllers\SecretController::class, 'secretStore'])->name('secret-store');
    Route::post('secret-accept-store', [App\Http\Controllers\SecretController::class, 'acceptStore'])->name('secret-accept-store');
    Route::post('secret-reject-store', [App\Http\Controllers\SecretController::class, 'rejectStore'])->name('secret-reject-store');
	
	
	//professional
	
	
    Route::get('professionals', [App\Http\Controllers\ProfessionalController::class, 'professionals'])->name('professionals');
    Route::get('professional-details/{id}', [App\Http\Controllers\ProfessionalController::class, 'pro_details'])->name('professional-details');
	Route::post('professional-search', [App\Http\Controllers\ProfessionalController::class, 'professionalSearch'])->name('professional-search');
    
    
});











///////////////ADMIN ROUTES/////////////////////

Route::group(['prefix' => 'admin', 'middleware' => ['userRedirect']], function () {
    Route::get('dashboard', [\App\Http\Controllers\admin\IndexController::class, 'index'])->name('admin-index');

    Route::get('profile-show', [\App\Http\Controllers\admin\ProfileController::class, 'profile_show'])->name('profile-show');
    Route::patch('profile-update-action', [\App\Http\Controllers\admin\ProfileController::class, 'profile_update_action'])->name('profile-update-action');
    Route::patch('profileImg-update-action', [\App\Http\Controllers\admin\ProfileController::class, 'profileImg_update'])->name('profileImg-update-action');

    Route::get('change-password-edit', [\App\Http\Controllers\admin\ProfileController::class, 'change_password_edit'])->name('change-password-edit');
    Route::patch('password-update-action', [\App\Http\Controllers\admin\ProfileController::class, 'password_update_action'])->name('password-update-action');
    
    

    Route::get('contacts-show', [\App\Http\Controllers\admin\CMSController::class, 'contactsShow'])->name('contacts-show');
    
    Route::get('term-condition-edit', [\App\Http\Controllers\admin\CMSController::class, 'termConditionEdit'])->name('term-condition-edit');
    Route::post('term-condition-update', [\App\Http\Controllers\admin\CMSController::class, 'termConditionUpdate'])->name('term-condition-update');

    Route::get('privacy-policy-edit', [\App\Http\Controllers\admin\CMSController::class, 'privacyPolicyEdit'])->name('privacy-policy-edit');
    Route::post('privacy-policy-update', [\App\Http\Controllers\admin\CMSController::class, 'privacyPolicyUpdate'])->name('privacy-policy-update');

    Route::get('equal-ment-edit', [\App\Http\Controllers\admin\CMSController::class, 'equalMentEdit'])->name('equal-ment-edit');
    Route::post('equal-ment-update', [\App\Http\Controllers\admin\CMSController::class, 'equalMentUpdate'])->name('equal-ment-update');
    
    
    
    Route::get('sliders-show', [\App\Http\Controllers\admin\SliderController::class, 'sliders_show'])->name('sliders-show');
    Route::get('slider-create', [\App\Http\Controllers\admin\SliderController::class, 'slider_create'])->name('slider-create');
    Route::post('slider-create-action', [\App\Http\Controllers\admin\SliderController::class, 'slider_create_action'])->name('slider-create-action');
    Route::get('slider-edit/{id}', [\App\Http\Controllers\admin\SliderController::class, 'slider_edit'])->name('slider-edit');
    Route::patch('slider-update-action', [\App\Http\Controllers\admin\SliderController::class, 'slider_update_action'])->name('slider-update-action');
    Route::delete('slider-delete/{id}', [\App\Http\Controllers\admin\SliderController::class, 'slider_delete'])->name('slider-delete');
    Route::post('ajax-slider-status-update', [\App\Http\Controllers\admin\SliderController::class, 'slider_status_update'])->name('ajax-slider-status-update');


    Route::get('origins-index', [\App\Http\Controllers\admin\OriginController::class, 'index'])->name('origins-index');
    Route::get('origin-create', [\App\Http\Controllers\admin\OriginController::class, 'create'])->name('origin-create');
    Route::post('origin-store', [\App\Http\Controllers\admin\OriginController::class, 'store'])->name('origin-store');
    Route::get('origin-edit/{id}', [\App\Http\Controllers\admin\OriginController::class, 'edit'])->name('origin-edit');
    Route::patch('origin-update', [\App\Http\Controllers\admin\OriginController::class, 'update'])->name('origin-update');
    Route::delete('origin-delete/{id}', [\App\Http\Controllers\admin\OriginController::class, 'destroy'])->name('origin-delete');


    Route::get('countries-index', [\App\Http\Controllers\admin\CountryController::class, 'index'])->name('countries-index');
    Route::get('country-create', [\App\Http\Controllers\admin\CountryController::class, 'create'])->name('country-create');
    Route::post('country-store', [\App\Http\Controllers\admin\CountryController::class, 'store'])->name('country-store');
    Route::get('country-edit/{id}', [\App\Http\Controllers\admin\CountryController::class, 'edit'])->name('country-edit');
    Route::patch('country-update', [\App\Http\Controllers\admin\CountryController::class, 'update'])->name('country-update');
    Route::delete('country-delete/{id}', [\App\Http\Controllers\admin\CountryController::class, 'destroy'])->name('country-delete');


    Route::get('cities-index', [\App\Http\Controllers\admin\CityController::class, 'index'])->name('cities-index');
    Route::get('city-create', [\App\Http\Controllers\admin\CityController::class, 'create'])->name('city-create');
    Route::post('city-store', [\App\Http\Controllers\admin\CityController::class, 'store'])->name('city-store');
    Route::get('city-edit/{id}', [\App\Http\Controllers\admin\CityController::class, 'edit'])->name('city-edit');
    Route::patch('city-update', [\App\Http\Controllers\admin\CityController::class, 'update'])->name('city-update');
    Route::delete('city-delete/{id}', [\App\Http\Controllers\admin\CityController::class, 'destroy'])->name('city-delete');
    

    Route::get('event-categories', [\App\Http\Controllers\admin\EventCategoryController::class, 'index'])->name('event-categories');
    Route::get('event-category-create', [\App\Http\Controllers\admin\EventCategoryController::class, 'create'])->name('event-category-create');
    Route::post('event-category-store', [\App\Http\Controllers\admin\EventCategoryController::class, 'store'])->name('event-category-store');
    Route::get('event-category-edit/{id}', [\App\Http\Controllers\admin\EventCategoryController::class, 'edit'])->name('event-category-edit');
    Route::patch('event-category-update', [\App\Http\Controllers\admin\EventCategoryController::class, 'update'])->name('event-category-update');
    Route::get('event-category-delete/{id}', [\App\Http\Controllers\admin\EventCategoryController::class, 'destroy'])->name('event-category-delete');
    

    Route::get('event-types', [\App\Http\Controllers\admin\EventTypeController::class, 'index'])->name('event-types');
    Route::get('event-type-create', [\App\Http\Controllers\admin\EventTypeController::class, 'create'])->name('event-type-create');
    Route::post('event-type-store', [\App\Http\Controllers\admin\EventTypeController::class, 'store'])->name('event-type-store');
    Route::get('event-type-edit/{id}', [\App\Http\Controllers\admin\EventTypeController::class, 'edit'])->name('event-type-edit');
    Route::patch('event-type-update', [\App\Http\Controllers\admin\EventTypeController::class, 'update'])->name('event-type-update');
    Route::get('event-type-delete/{id}', [\App\Http\Controllers\admin\EventTypeController::class, 'destroy'])->name('event-type-delete');

    
    
    Route::get('events-pending', [\App\Http\Controllers\admin\EventController::class, 'pendingEvents'])->name('events-pending');
    Route::get('pending-event-view/{id}', [\App\Http\Controllers\admin\EventController::class, 'pendingEventView'])->name('pending-event-view');
    Route::get('events-completed', [\App\Http\Controllers\admin\EventController::class, 'completedEvents'])->name('events-completed');
    Route::get('completed-event-view/{id}', [\App\Http\Controllers\admin\EventController::class, 'completedEventView'])->name('completed-event-view');
    
    
    Route::get('members-show', [\App\Http\Controllers\admin\UserController::class, 'members'])->name('members-show');
    Route::get('member-view/{id}', [\App\Http\Controllers\admin\UserController::class, 'member_view'])->name('member-view');
    Route::get('professionals-show', [\App\Http\Controllers\admin\UserController::class, 'professionals'])->name('professionals-show');
    Route::get('pro-view/{id}', [\App\Http\Controllers\admin\UserController::class, 'pro_view'])->name('pro-view');
    
    
    Route::get('pending-members-show', [\App\Http\Controllers\admin\UserController::class, 'pending_members'])->name('pending-members-show');
    Route::post('user-update-approved-status', [\App\Http\Controllers\admin\UserController::class, 'updateUserStatus'])->name('user-update-approved-status');
    Route::post('user-update-active-status', [\App\Http\Controllers\admin\UserController::class, 'updateActiveStatus'])->name('user-update-active-status');
    Route::get('pending-professionals-show', [\App\Http\Controllers\admin\UserController::class, 'pending_professionals'])->name('pending-professionals-show');
    
    Route::get('plans', [\App\Http\Controllers\admin\PlanController::class, 'index'])->name('plans');
    Route::get('plan-create', [\App\Http\Controllers\admin\PlanController::class, 'create'])->name('plan-create');
    Route::post('plan-store', [\App\Http\Controllers\admin\PlanController::class, 'store'])->name('plan-store');
    Route::get('plan-edit/{id}', [\App\Http\Controllers\admin\PlanController::class, 'edit'])->name('plan-edit');
    Route::patch('plan-update', [\App\Http\Controllers\admin\PlanController::class, 'update'])->name('plan-update');
    
    
    

});

