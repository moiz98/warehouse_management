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
Route::get('/products', 'ProductsController@index');

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
    Route::get('/', 'ManagerController@index')->name('manager.dashboard');
    Route::get('/logout', 'Auth\EmployeeLoginController@logout')->name('employee.logout');
});

Route::get('/verifyEmail', 'Auth\RegisterController@verifyEmailfirst')->name('verifyEmailfirst');
Route::get('/verify/{email}/{verifyToken}', 'Auth\RegisterController@sendEmailDone')->name('sendEmailDone');
Route::get('/adminproducts', 'ProductsController@adminindex')->name('admin.products');
Route::get('/employeeproducts', 'ManagerController@managerindex')->name('manager.products');
Route::get('/products/{category}', 'ProductsController@cat_page')->name('prodcatpage');
Route::get('/cart/{cart_id}', 'OrdersController@cart')->name('user_cart');
Route::get('/products/cart/{user_id}/{product_id}', 'OrdersController@createOrder')->name('createOrder.details');
Route::get('/products/cart/{cart_id}', 'OrdersController@placeOrder')->name('buyproducts.cart');

Route::resource('addresses', 'AddressesController');
Route::resource('Products', 'ProductsController');
Route::resource('category', 'CategoriesController');
Route::resource('suppliers', 'SuppliersController');
Route::resource('employees', 'EmployeeController');
Route::resource('Reports', 'ReportsController');
Route::resource('inventory', 'InventoryController');

Route::get('/test/{user_id}', function($user_id)
{
    $user = App\User::find($user_id);
    $user_orders = $user->orders;

    dd($user->orders->order_details);
});
