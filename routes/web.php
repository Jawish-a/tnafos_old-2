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
// home page
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
// admin login page
Route::get('/admin', function () {
    return view('admin');
}, 'auth')->name('admin')->middleware('auth');


Route::get('/home', 'HomeController@index')->name('home');
// for the admin panel and models
Route::resource('settings', 'SettingsController');
Route::resource('category', 'CategoryController');
// to fix the store and show in orders then uncomment this web route
//Route::resource('product', 'ProductController');
Route::resource('brand', 'BrandController');
Route::resource('service', 'ServiceController');
Route::resource('company', 'CompanyController');
Route::resource('user', 'UserController');
Route::resource('estimate', 'EstimateController');

// for search function
Route::get('/search', 'HomeController@search')->name('search');
Route::get('/search/{product}', 'HomeController@details')->name('details');

//for Quest function to work
Route::get('/addProductToQuest/{id}',[
    'uses' => 'ProductController@getAddToQuest',
    'as' => 'addProductToQuest'
]);
//for Quest for services function to work
Route::get('/addServiceToQuest/{id}',[
    'uses' => 'ServiceController@getAddToQuest',
    'as' => 'addServiceToQuest'
]);

Route::get('/list', 'HomeController@list')->name('list');


// for storing the order and managing it
Route::resource('order', 'OrderController');
Route::get('inbox', 'OrderController@inbox')->name('inbox');
Route::get('inboxShow/{id}', 'OrderController@inboxShow')->name('inboxShow');
// to print the estimate
Route::get('estimate/{id}/print', 'EstimateController@print')->name('estimatePrint');
