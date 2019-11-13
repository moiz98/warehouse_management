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

Route::get('/', 'PagesController@index');
Route::get('/about', 'PagesController@about');
Route::get('/contact', 'PagesController@contact');
Route::get('/products', 'PagesController@products');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/users/logout', 'Auth\LoginController@userlogout')->name('user.logout');

Route::prefix('admin')->group(function()
{
    Route::get('/login', 'Auth\AdminLoginController@ShowLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
    Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
});
Route::prefix('employee')->group(function()
{
    Route::get('/login', 'Auth\EmployeeLoginController@ShowLoginForm')->name('employee.login');
    Route::post('/login', 'Auth\EmployeeLoginController@login')->name('employee.login.submit');
    Route::get('/', 'EmployeeController@index')->name('employee.dashboard');
    Route::get('/logout', 'Auth\EmployeeLoginController@logout')->name('employee.logout');
});

Route::get('/verifyEmail', 'Auth\RegisterController@verifyEmailfirst')->name('verifyEmailfirst');
Route::get('/verify/{email}/{verifyToken}', 'Auth\RegisterController@sendEmailDone')->name('sendEmailDone');
