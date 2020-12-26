<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group([

    'middleware' => 'api'

], function () {

    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
});

Route::group([

    'middleware' => 'cors',

], function () {

    //products
    Route::get('products', 'ProductController@index');
    Route::get('product/{id}', 'ProductController@show');
    Route::get('product-new', 'ProductController@newArrived');
    Route::get('product-feature', 'ProductController@featured');
    Route::get('product-week-deals', 'ProductController@weekDeals');
    Route::get('product-special-deals', 'ProductController@specialDeals');
    Route::get('product-related/{id}', 'ProductController@related');
    Route::match(['get', 'post'], '/filter', 'ProductController@filter');

    //brands
    Route::get('brands', 'BrandController@index');
    Route::get('products-by-brand/{id}', 'BrandController@productsByBrand');

    //category
    Route::get('categories', 'CategoryController@index');
    Route::get('products-by-category/{id}', 'CategoryController@productsBycategory');

    //subcategory
    Route::get('subcategories', 'SubCategoryController@index');
    Route::get('products-by-subcategory/{id}', 'SubCategoryController@productsBysubcategory');
});
