<?php

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

Route::get('/', 'Frontend\HomeController@index')->name('index');
Route::get('/insurance-list', 'Frontend\HomeController@insuranceList');
Route::get('/home', 'Frontend\HomeController@index')->name('home');
Route::get('/motorcycle-index', 'Frontend\HomeController@motorcycleIndex')->name('motorcycle-index');
Route::get('/bicycle-index', 'Frontend\HomeController@bicycleIndex')->name('bicycle-index');

Route::get('/about-us', 'Frontend\HomeController@aboutUs')->name('about-us');
Route::get('/add-to-compare', 'Frontend\HomeController@addToCompare')->name('add-to-compare');
Route::get('/auction-bidding-list/{product}', 'Frontend\HomeController@auctionBiddingList')->name('auction-bidding-list');
Route::get('/auction-product-list', 'Frontend\HomeController@auctionProductList')->name('auction-product-list');
Route::resource('banks', 'Backend\BankController');
Route::get('/manage-banks', 'Backend\BankController@manageIndex')->name('manage-banks');
Route::get('/bicycle-compare', 'Frontend\HomeController@bicycleCompare')->name('bicycle-compare');
Route::get('/bicycle-fit-calculator', 'Frontend\HomeController@bicycleFitCalculator')->name('bicycle-fit-calculator');
Route::get('/bicycle-listing', 'Frontend\HomeController@motorcycleListing')->name('bicycle-listing');
Route::resource('blogs', 'Backend\BlogController');
Route::get('/manage-blogs', 'Backend\BlogController@manageIndex')->name('manage-blogs');
Route::get('/manage-insurance-companies', 'Backend\InsuranceCompanyController@manageIndex')->name('manage-insurance-companies');
Route::get('/motorcycle-cart', 'Frontend\HomeController@motorcycleCart')->name('motorcycle-cart');
Route::get('/motorcycle-checkout', 'Frontend\HomeController@motorcycleCheckout')->name('motorcycle-checkout');
Route::get('/motorcycle-compare', 'Frontend\HomeController@motorcycleCompare')->name('motorcycle-compare');
Route::get('/motorcycle-listing', 'Frontend\HomeController@motorcycleListing')->name('motorcycle-listing');
Route::get('/motorcycle-wishlist', 'Frontend\HomeController@motorcycleWishlist')->name('motorcycle-wishlist');
Route::get('/car-ad-post', 'Frontend\HomeController@carAdPost')->name('car-ad-post');

Route::get('/car-listing', 'Frontend\HomeController@carListing')->name('car-listing');
Route::get('/car-loan', 'Frontend\HomeController@carLoan')->name('car-loan');
Route::resource('loan-applications', 'Backend\LoanApplicationController');
Route::get('loan-applications-unviewed', 'Backend\LoanApplicationController@unviewed')->name('loan-applications.unviewed');
Route::get('/loan-eligibility', 'Frontend\LoanInfoController@create')->name('loan-eligibility');
Route::get('/car-loan-insurance-check', 'Frontend\HomeController@carLoanInsuranceCheck')->name('car-loan-insurance-check');
Route::get('/compare/{url?}', 'Frontend\HomeController@compare')->name('compare');
Route::post('/compare-car', 'Frontend\HomeController@compareCar')->name('compare-car');
Route::get('/contact-us', 'Frontend\HomeController@contactUs')->name('contact-us');
Route::get('/dealer-detail/{id}', 'Frontend\HomeController@dealerDetail')->name('dealer-detail');
Route::get('/dealer-list', 'Frontend\HomeController@dealerList')->name('dealer-list');
Route::resource('fit-calculators', 'Frontend\FitCalculatorController');
Route::get('/fit-calculator/{detail}', 'Frontend\FitCalculatorController@fitCalculator')->name('fit-calculator');
Route::get('/group-buying-list', 'Frontend\HomeController@groupBuyingList')->name('group-buying-list');
Route::resource('insurances', 'Frontend\InsuranceController');
Route::get('/insurance', 'Frontend\InsuranceController@create')->name('insurance');
Route::get('/insurance-photos', 'Frontend\InsuranceController@photos')->name('insurance-photos');
Route::get('/insurance-checkout', 'Frontend\InsuranceController@checkout')->name('insurance-checkout');
Route::post('/insurance-checkout-store', 'Frontend\InsuranceController@checkoutStore')->name('insurance-checkout-store');
Route::resource('insurance-companies', 'Backend\InsuranceCompanyController');
Route::get('/national-distributor-detail/{id}', 'Frontend\HomeController@nationalDistributorDetail')->name('national-distributor-detail');
Route::get('/national-distributor-list', 'Frontend\HomeController@nationalDistributorList')->name('national-distributor-list');
Route::get('/privacy-policy', 'Frontend\HomeController@privacyPolicy')->name('privacy-policy');
Route::get('/get-product', 'Backend\ProductController@getProduct')->name('get-product');
Route::get('/get-regions', 'Frontend\HomeController@getRegions')->name('get-regions');
Route::get('/get-region', 'Frontend\HomeController@getRegion')->name('get-region');
Route::get('/search-page', 'Frontend\HomeController@searchPage')->name('search-page');

Route::get('/sell-product-list', 'Frontend\HomeController@sellProductList')->name('sell-product-list');
Route::get('/single-accessories', 'Frontend\HomeController@singleAccessories')->name('single-accessories');
Route::get('/single-bicycle-product/{product}', 'Frontend\HomeController@singleBicycleProduct')->name('single-bicycle-product');
Route::get('/single-motorcycle-product/{product}', 'Frontend\HomeController@singleMotorcycleProduct')->name('single-motorcycle-product');
Route::get('/single-blog', 'Frontend\HomeController@singleBlog')->name('single-blog');
Route::get('/single-car-product/{product}', 'Frontend\HomeController@singleCarProduct')->name('single-car-product');
Route::get('/single-sell-product/{product}', 'Frontend\HomeController@singleSellProduct')->name('single-sell-product');
Route::get('/term-and-condition', 'Frontend\HomeController@termAndCondition')->name('term-and-condition');
Route::post('/send-otp', 'Frontend\HomeController@sendOtp')->name('send-otp');
Route::post('/verify-otp', 'Frontend\HomeController@verifyOtp')->name('verify-otp');

Auth::routes(['verify' => true]);
//Route::get('contact-us', 'Backend\ContactUsController@create')->name('contact-us.create');
Route::post('contact-us', 'Backend\ContactUsController@store')->name('contact-us.store');
Route::resource('divisions', 'Locations\DivisionController');
Route::resource('districts', 'Locations\DistrictController');
Route::resource('upazilas', 'Locations\UpazilaController');
Route::resource('unions', 'Locations\UnionController');
Route::resource('home-sliders', 'Backend\HomeSliderController');
Route::resource('loan-infos', 'Frontend\LoanInfoController');
Route::resource('requested-more-infos', 'Frontend\RequestedMoreInfoController');
Route::get('requested-more-infos-unviewed', 'Frontend\RequestedMoreInfoController@unviewed')->name('requested-more-infos.unviewed');
Route::resource('make-an-offers', 'Frontend\MakeAnOfferController');
Route::get('make-an-offers-unviewed', 'Frontend\MakeAnOfferController@unviewed')->name('make-an-offers.unviewed');
Route::resource('orders', 'Backend\OrderController');
Route::resource('products', 'Backend\ProductController');
Route::get('order-complete', 'Backend\OrderController@orderComplete')->name('order-complete');
Route::get('/panorama', function() {
    return view('frontend.panorama');
})->name('panorama');
//Routes for dashboard
Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::get('/seller-my-ad/{id}', 'Frontend\HomeController@sellerMyAd')->name('seller-my-ad');
    Route::get('/seller-profile/{id}', 'Frontend\HomeController@sellerProfile')->name('seller-profile');

    Route::resource('auctions', 'Backend\AuctionController');
    Route::get('/dashboard', 'Backend\DashboardController@dashboard')->name('dashboard');
    Route::resource('cashbooks', 'Backend\CashbookController');
    Route::resource('users', 'Backend\UserController');
    Route::resource('chats', 'Backend\ChatController');
    Route::get('seller-message', 'Backend\ChatController@indexFront')->name('seller-message');
    Route::get('seller-message/{id}', 'Backend\ChatController@showFront')->name('seller-message.show');
    Route::resource('categories', 'Backend\CategoryController')->middleware('moderator:Category');
    Route::resource('payments', 'Backend\PaymentController')->middleware('moderator:Payment');
    Route::resource('suppliers', 'Backend\SupplierController')->middleware('moderator:Supplier');
    Route::resource('notifications', 'Backend\NotificationController');
    Route::get('notifications-all', 'Backend\NotificationController@all')->name('notifications.all');
    Route::resource('regions', 'Locations\RegionController')->middleware('moderator:Location');
    Route::resource('sizes', 'Backend\SizeController')->middleware('moderator:Size');
    Route::resource('colors', 'Backend\ColorController')->middleware('moderator:Color');

    Route::get('products-auction/{id}', 'Backend\ProductController@auction')->name('products.auction');
    Route::post('products-auction/{id}', 'Backend\ProductController@auctionStore')->name('products.auction.store');

    Route::resource('cars', 'Backend\CarController')->middleware('moderator:Product');
    Route::resource('motorcycles', 'Backend\MotorcycleController')->middleware('moderator:Product');
    Route::resource('bicycles', 'Backend\BicycleController')->middleware('moderator:Product');
    Route::resource('units', 'Backend\UnitController')->middleware('moderator:Unit');
    Route::resource('order-statuses', 'Backend\OrderStatusController')->middleware('moderator:Order Status');
    Route::resource('shippers', 'Backend\ShipperController')->middleware('moderator:Shipper');
    Route::get('orders-user', 'Backend\OrderController@user')->name('orders.user');
    Route::get('orders-incomplete', 'Backend\OrderController@incomplete')->name('orders.incomplete');
    Route::resource('order-details', 'Backend\OrderDetailController');
    Route::resource('permissions', 'Backend\PermissionController')->middleware('moderator:Permission');
    Route::put('permissions-update', 'Backend\PermissionController@updateList')->name('permissions.update.list')->middleware('moderator:Permission');
    Route::resource('comments', 'Backend\CommentController');
    Route::resource('sub-comments', 'Backend\SubCommentController');
    Route::resource('reviews', 'Frontend\ReviewController');

    Route::get('/clear-cache', function() {
        Artisan::call('cache:clear');
        Artisan::call('view:clear');
        return redirect('/dashboard');
    });
});
//Dropdowns
Route::prefix('dropdowns')->group(function () {
    Route::resource('additional-features', 'Backend\Dropdowns\AdditionalFeatureController')->middleware('moderator:Dropdown');
    Route::resource('after-sell-services', 'Backend\Dropdowns\AfterSellServiceController')->middleware('moderator:Dropdown');
    Route::resource('auction-grades', 'Backend\Dropdowns\AuctionGradeController')->middleware('moderator:Dropdown');
    Route::resource('body-types', 'Backend\Dropdowns\BodyTypeController')->middleware('moderator:Dropdown');
    Route::resource('brands', 'Backend\Dropdowns\BrandController')->middleware('moderator:Dropdown');
    Route::resource('conditions', 'Backend\Dropdowns\ConditionController')->middleware('moderator:Dropdown');
    Route::resource('cooling-systems', 'Backend\Dropdowns\CoolingSystemController')->middleware('moderator:Dropdown');
    Route::resource('coverages', 'Backend\Dropdowns\CoverageController')->middleware('moderator:Dropdown');
    Route::resource('cylinders', 'Backend\Dropdowns\CylinderController')->middleware('moderator:Dropdown');
    Route::resource('displacements', 'Backend\Dropdowns\DisplacementController')->middleware('moderator:Dropdown');
    Route::resource('displacement-ranges', 'Backend\Dropdowns\DisplacementRangeController')->middleware('moderator:Dropdown');
    Route::resource('drive-types', 'Backend\Dropdowns\DriveTypeController')->middleware('moderator:Dropdown');
    Route::resource('engine-types', 'Backend\Dropdowns\EngineTypeController')->middleware('moderator:Dropdown');
    Route::resource('exterior-features', 'Backend\Dropdowns\ExteriorFeatureController')->middleware('moderator:Dropdown');
    Route::resource('front-brakes', 'Backend\Dropdowns\FrontBrakeController')->middleware('moderator:Dropdown');
    Route::resource('fuel-types', 'Backend\Dropdowns\FuelTypeController')->middleware('moderator:Dropdown');
    Route::resource('gear-boxes', 'Backend\Dropdowns\GearBoxController')->middleware('moderator:Dropdown');
    Route::resource('ground-clearances', 'Backend\Dropdowns\GroundClearanceController')->middleware('moderator:Dropdown');
    Route::resource('interior-features', 'Backend\Dropdowns\InteriorFeatureController')->middleware('moderator:Dropdown');
    Route::resource('insurance-features', 'Backend\Dropdowns\InsuranceFeatureController')->middleware('moderator:Dropdown');
    Route::resource('key-features', 'Backend\Dropdowns\KeyFeatureController')->middleware('moderator:Dropdown');
    Route::resource('made-ins', 'Backend\Dropdowns\MadeInController')->middleware('moderator:Dropdown');
    Route::resource('made-origins', 'Backend\Dropdowns\MadeOriginController')->middleware('moderator:Dropdown');
    Route::resource('models', 'Backend\Dropdowns\ModelController')->middleware('moderator:Dropdown');
    Route::resource('ownerships', 'Backend\Dropdowns\OwnershipController')->middleware('moderator:Dropdown');
    Route::resource('packages', 'Backend\Dropdowns\PackageController')->middleware('moderator:Dropdown');
    Route::resource('rear-brakes', 'Backend\Dropdowns\RearBrakeController')->middleware('moderator:Dropdown');
    Route::resource('safety-securities', 'Backend\Dropdowns\SafetySecurityController')->middleware('moderator:Dropdown');
    Route::resource('selling-capacities', 'Backend\Dropdowns\SellingCapacityController')->middleware('moderator:Dropdown');
    Route::resource('starting-systems', 'Backend\Dropdowns\StartingSystemController')->middleware('moderator:Dropdown');
    Route::resource('transmissions', 'Backend\Dropdowns\TransmissionController')->middleware('moderator:Dropdown');
    Route::resource('tyre-types', 'Backend\Dropdowns\TyreTypeController')->middleware('moderator:Dropdown');
    Route::resource('wheel-bases', 'Backend\Dropdowns\WheelBaseController')->middleware('moderator:Dropdown');
    Route::resource('wheel-types', 'Backend\Dropdowns\WheelTypeController')->middleware('moderator:Dropdown');
    Route::resource('user-types', 'Backend\Dropdowns\UserTypeController')->middleware('moderator:Dropdown');
    Route::resource('what-a-news', 'Backend\Dropdowns\WhatANewController')->middleware('moderator:Dropdown');
    Route::resource('pros-conses', 'Backend\Dropdowns\ProsConsController')->middleware('moderator:Dropdown');
    Route::resource('within-kms', 'Backend\Dropdowns\WithinKmController')->middleware('moderator:Dropdown');
});
