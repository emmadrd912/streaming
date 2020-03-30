<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/add-video', 'HomeController@addvideo');

Route::group(['middleware' => ['role:premium|free']], function () {
    Route::get('billing', 'BillingController@index')->name('billing');
    Route::get('checkout/{plan_id}', 'CheckoutController@checkout')->name('checkout');
    Route::post('checkout', 'CheckoutController@processCheckout')->name('checkout.process');
    Route::get('cancel', 'BillingController@cancel')->name('cancel');
    Route::get('resume', 'BillingController@resume')->name('resume');
    Route::get('payment-methods/default/{methodId}', 'PaymentMethodController@markDefault')->name('payment-methods.markDefault');
    Route::resource('payment-methods', 'PaymentMethodController');
});

Route::group(['middleware' => ['role:premium|admin|free']], function () {
    Route::resource('profile', 'ProfileController');
});

Route::group(['middleware' => ['role:premium']], function () {
  Route::get('invoices', 'CheckoutController@invoices');
  Route::get('account/invoices/{invoice}', 'CheckoutController@downloadInvoice');
});

Route::group(['middleware' => ['role:premium|admin']], function () {
    Route::get('/catalog', function () { return view('catalog'); });
});

Route::group(['middleware' => ['role:admin']], function () {
    Route::resource('users', 'UsersController');
    Route::resource('roles','RoleController');
    // Route::resource('content','VideoController');
    Route::resource('contents', 'VideoController');
    Route::post('video', 'VideoController@moviestore')->name('contents.moviestore');
});

Route::group(['middleware' => ['role:free']], function () {
    Route::get('/catalogfree', function () { return view('catalogfree'); });
});
Route::get('/sendmail', 'MailController@sendmail');
