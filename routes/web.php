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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('admin/routes', 'HomeController@admin')->middleware('admin');
Route::get('/admin_home', function () {
     return view('admin.home');
 })->middleware('admin');
 Route::get('/registered_users', 'AdminController@users')->middleware('admin')->name('registered_users');
Route::get('/delete/{id}','AdminController@delete')->middleware('admin');
Route::get('/delete_ad/{id}','AdminController@delete_ad')->middleware('admin');

Route::get('/advertisements','AdminController@posts')->middleware('admin');
Route::get('/subscribers','AdminController@subscribers')->middleware('admin');

Route::get('/','UsersController@index');

Route::get('/sendemail', 'SendEmailController@index');
Route::post('/sendemail/send', 'SendEmailController@send');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('UsersController/fetch','UsersController@fetch')->name('searchlocation.fetch');
//For displaying cities below states text box
Route::post('UsersController/cities','UsersController@cities')->name('state.cities');
//For fetching main categories and displaying them inside dropdown
Route::post('UsersController/retrieve','UsersController@retrieve')->name('categories.retrieve');
//To display select your category page 
Route::get('post-classified-ads','UsersController@postad');

//To display various views when category clicked
Route::get('/post-classified-ads/{mainCategory}/{id}','UsersController@categories');
//To post or publish ads
Route::post('/postCarsBikes','UsersController@postCrafts');
//To load all ads
Route::get('UsersController/getAds','UsersController@getAds')->name('categories.ads');

//To post or publish ads
Route::get('/viewAds/{mainCategory}/{id}','UsersController@viewAds');

//To search ads by product name
Route::post('/product/search','UsersController@searchProduct');

//To search ads by state and category
Route::post('/search/advertisements','UsersController@searchAdvertisements');

//To view advertisements
Route::get('/product/view/{id}','UsersController@viewProduct');

Route::get('/subscribe', 'MailChimpController@index');
Route::post('/subscribe', 'MailChimpController@manageMailChimp');
