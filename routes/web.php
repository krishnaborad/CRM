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

 Route::get('/', function () {
    return view('welcome');
   return view('admin/index');
});
Auth::routes();
Route::get('/timeline', 'timelineController@index')->name('timeline');


Route::get('/comment/{id}', 'commentController@index')->name('comment');
Route::post('/comment/{id}', 'commentController@store')->name('comment');

 Route::get('/account', 'accountController@index')->name('account');
 Route::get('/account', 'accountController@create')->name('account');

 Route::post('/account', 'accountController@store')->name('account');
 // ORDER
 Route::get('/frontend/product_show/', 'product_showController@index')->name('product_show');

 Route::get('/frontend/order/{id}', 'product_showController@order')->name('order');
 Route::get('/frontend/product_details/{id}', 'product_showController@show')->name('order');


 Route::post('/frontend/order/{id}', 'product_showController@send')->name('order');

Route::middleware(['auth'])->prefix('admin')->  group(function () {
  Route::get('/', function () {
     return view('admin/index');
  });
         Route::get('companys', 'companyController@index');
         Route::get('company/create', 'companyController@create');
         Route::post('company/create', 'companyController@store');
         Route::get('company/edit/{id}', 'companyController@edit');
         Route::post('company/edit/{id}', 'companyController@update');
         Route::get('company/delete/{id}', 'companyController@delete');
         Route::get('/company/{id}', 'companyController@products');
         Route::get('company/theme', 'companyController@create');
         Route::post('company/theme', 'companyController@store');

        Route::get('categorys', 'categorysController@index');
        // Route::get('category/DataTable', 'categorysController@datatable');

        Route::get('category/create', 'categorysController@create');
        Route::post('category/create', 'categorysController@store');
        Route::get('category/edit/{id}', 'categorysController@edit');
        Route::post('category/edit/{id}', 'categorysController@update');
        Route::get('category/delete/{id}', 'categorysController@delete');
        Route::post('category/deleteall', 'categorysController@deleteall');
        Route::get('/category/{id}', 'CategoryController@products');

        Route::get('products', 'productsController@index');
        // Route::get('product/DataTable', 'productsController@datatable');

        Route::get('product/create', 'productsController@create');
        Route::post('product/create', 'productsController@store');
        Route::get('product/edit/{id}', 'productsController@edit');
        Route::post('product/edit/{id}', 'productsController@update');


        Route::get('product/order/{id}', 'productsController@watch');



        Route::get('product/delete/{id}', 'productsController@delete');
        Route::post('product/deleteall', 'productsController@deleteall');
        Route::get('product/delete/{id}/{product_id}', 'productsController@imagedelete');

        Route::get('profile', 'profileController@index');
        Route::post('profile_edit/profile', 'profileController@store');
        Route::get('profile_edit/reset', 'resetController@index');
        Route::post('profile_edit/reset', 'resetController@update');

        Route::get('type_users', 'usertypeController@index');
        Route::get('type_user/create', 'usertypeController@create');
        Route::post('type_user/create', 'usertypeController@store');
        Route::get('type_user/delete/{id}', 'usertypeController@delete');

        Route::get('users', 'usersController@index');
        Route::get('user/create', 'usersController@create');
        Route::post('user/create', 'usersController@store');
        Route::get('user/edit/{id}', 'usersController@edit');
        Route::post('user/edit/{id}', 'usersController@update');
        Route::get('user/show/{id}', 'usersController@show');

        Route::get('user/user_family/{id}', 'usersController@family_index');
        Route::get('user/add/{id}', 'usersController@family_add');
        Route::post('user/add/{id}', 'usersController@family_store');
        Route::get('user/delete/{id}', 'usersController@delete');
        Route::get('user/user_family/delete/{id}', 'usersController@relation_delete');

        Route::get('logins/', 'loginController@index');
        Route::get('login/create_login', 'loginController@create');
        Route::post('login/create_login', 'loginController@store');
        Route::get('login/delete/{id}', 'loginController@delete');

        Route::get('upload', 'uploadController@index');
        Route::post('upload', 'uploadController@upload');
        Route::get('upload/delete/{id}', 'uploadController@delete');

        Route::get('comments', 'admincommentsController@index');
        Route::post('comments', 'admincommentsController@store');
        Route::get('comments/delete/{id}', 'admincommentsController@delete');

        Route::get('orders', 'ordersController@index');
        Route::get('order/show/{id}', 'ordersController@show');
        Route::get('order/delete/{id}', 'ordersController@delete');
        Route::post('order/deleteall', 'ordersController@deleteall');

        Route::get('send/', 'ordersController@sendMail');

        // PDF & EXCEL SHEET ROUTES

        Route::get('orders/order_pdf/{id}/', 'pdf_excelController@order_pdf');
        Route::get('pdf_formate/', 'pdf_excelController@pdf')->name('pdf_formate');
        Route::get('excel_formate/', 'pdf_excelController@excel')->name('excel_formate');
        Route::post('import_excel/', 'pdf_excelController@import_excel')->name('import_excel');

        // Settings
        Route::get('general/','settingsController@index');
        Route::post('general/', 'settingsController@store');

        Route::get('controls/','settingsController@control_index');


   });
