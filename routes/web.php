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



/**------------------------------
*
* Front end Route
*
*--------------------------------------*/
Auth::routes();

//Route with Localization
Route::group(
[
	'prefix' => LaravelLocalization::setLocale(),
	'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
],
function()
{
	/** ADD ALL LOCALIZED ROUTES INSIDE THIS GROUP **/
	//Route::get('/home', 'HomeController@index');
	Route::get('/portfolio', function () {
	    return view('welcome');
	});
	Route::get('/', 'Frontend\ForntendController@index');
	Route::get('/productDetails/{id}', 'Frontend\ForntendController@productDetails')->name('productDetails');
	//users login/registration
	//Route::get('user_login', 'ForntendController@userLogin')->name('user_login');

	// cart
	Route::get('cart', 'Frontend\CartController@index')->name('cart');
	Route::post('cart', 'Frontend\CartController@getCart')->name('cart');
	Route::post('cart-delete/{id}', 'Frontend\CartController@deleteCart')->name('cart-delete');

	// wishlisht
	Route::get('wishlist', 'Frontend\WishlistController@index')->name('wishlist');
	Route::post('wishlist', 'Frontend\WishlistController@getWishlist')->name('wishlist');
	Route::post('wishlist-delete/{id}', 'Frontend\WishlistController@deleteCart')->name('wishlist-delete');

	// checkout
	//Route::group(['middleware' => 'customer'], function(){
		//Route::group(['middleware' => 'emptyCart'], function(){
			Route::get('checkout', 'Frontend\CheckoutController@checkout1')->name('checkout1');
			Route::match(['post'], 'checkout', 'Frontend\CheckoutController@checkout2')->name('checkout2');
			// Route::match(['get', 'post'], 'checkout-step-3', 'Frontend\CheckoutController@checkout3')->name('checkout3');
			// Route::get('checkout-step-4', 'Frontend\CheckoutController@checkout4')->name('checkout4');
			Route::post('/pay', 'Frontend\PaymentController@redirectToGateway')->name('pay'); 
			Route::get('/payment/callback', 'Frontend\PaymentController@handleGatewayCallback');
		//});
	//});

	
});

/**------------------------------
*
* Back end Route
*
*--------------------------------------*/

Route::group(['prefix' => 'admin'],  function(){
	Route::group(['middleware' => ['admin_guest']], function(){

		Route::get('/login', 'Admin\Auth\LoginController@showloginForm');
		Route::post('/login', 'Admin\Auth\LoginController@login');			
		Route::get('/registration', 'Admin\Auth\RegistrationController@showRegiForm');	
		Route::post('/registration', 'Admin\Auth\RegistrationController@register');	
	});

	
});

Route::group(['middleware' => ['admin']], function(){
	Route::post('/admin/logout', 'Admin\Auth\LoginController@logout');
});

//Route with Localization

Route::group(
[
	'prefix' => LaravelLocalization::setLocale(),
	'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
],
function()
{
	/** ADD ALL LOCALIZED ROUTES INSIDE THIS GROUP **/
	Route::group(['prefix' => 'admin'],  function(){
		//Route::group(['middleware' => ['admin']], function(){				
			Route::get('/home', 'HomeController@index');
			Route::get('/select', 'CategoryController@select')->name('select');				
			Route::resource('categories', 'CategoryController');
			Route::resource('brands', 'BrandController');
			
			Route::resource('subcategories', 'SubcategoryController');
			Route::resource('compositions', 'CompositionController');

			Route::resource('products', 'ProductController');
			
		//});
	});
});






