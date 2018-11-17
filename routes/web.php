<?php

 Route::get('/', function () {
    return view('welcome');
   return view('admin/index');
});
Auth::routes();

Route::get('/timeline', 'timelineController@index')->name('timeline');
Route::get('/home', 'HomeController@index');

Route::get('/universities', 'frontendController@index_uni')->name('universities');
Route::get('/products', 'frontendController@index_products')->name('products');
Route::get('/buy/{id}', 'frontendController@product_buy')->name('products');


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

        Route::get('company/view/{id}', 'companyController@view');

        Route::get('categorys', 'categorysController@index');
        Route::post('categorys', 'categorysController@store');
        Route::get('category/edit/{id}', 'categorysController@edit');
        Route::post('category/edit/{id}', 'categorysController@update');
        Route::get('category/delete/{id}', 'categorysController@delete');
        Route::post('category/deleteall', 'categorysController@deleteall');

        Route::get('products', 'productsController@index');
        Route::get('product/create', 'productsController@create');
        Route::post('product/create', 'productsController@store');
        Route::get('product/edit/{id}', 'productsController@edit');
        Route::post('product/edit/{id}', 'productsController@update');

        Route::get('product/order/{id}', 'productsController@watch');

        Route::get('product/delete/{id}', 'productsController@delete');
        Route::post('product/deleteall', 'productsController@deleteall');
        // Route::get('product/delete/{id}/{product_id}', 'productsController@imagedelete');

        Route::get('profile', 'profileController@index');
        Route::post('profile', 'profileController@store');
        Route::get('profile_edit/reset', 'resetController@index');
        Route::post('profile_edit/reset', 'resetController@update');

        Route::get('type_users', 'usertypeController@index');
        Route::get('type_users/DataTable', 'usertypeController@DataTable');
        Route::get('type_user/create', 'usertypeController@create');
        Route::post('type_user/create', 'usertypeController@store');
        Route::get('type_user/delete/{id}', 'usertypeController@delete');

        Route::get('users', 'usersController@index');
        Route::get('user/create', 'usersController@create');
        Route::post('user/create', 'usersController@store');
        Route::get('user/get-state-list','NationalityController@getStateList');
        Route::get('user/get-city-list','NationalityController@getCityList');

        Route::get('user/edit/{id}', 'usersController@edit');
        Route::post('user/edit/{id}', 'usersController@update');
        Route::get('user/show/{id}', 'usersController@show');
        Route::post('user/deleteall', 'usersController@deleteall');

        Route::get('user/user_family/{id}', 'usersController@family_index');
        Route::get('user/add/{id}', 'usersController@family_add');
        Route::post('user/add/{id}', 'usersController@family_store');
        Route::get('user/delete/{id}', 'usersController@delete');
        Route::get('user/user_family/delete/{id}', 'usersController@relation_delete');

        Route::get('Nationality','NationalityController@index');
        Route::get('Nationality/get-state-list','NationalityController@getStateList');
        Route::get('Nationality/get-city-list','NationalityController@getCityList');
        // // Route for Add data
        Route::get('Nationality', 'NationalityController@test_index');
        Route::post('Nationality', 'NationalityController@store_country');
        Route::get('Nationality/create', 'NationalityController@create');
        Route::post('Nationality/create', 'NationalityController@state_store');
        Route::get('Nationality/create_city','NationalityController@create_city');
        Route::post('Nationality/create_city','NationalityController@city_store');

        Route::get('pos', 'posController@index');
        Route::post('pos', 'posController@post');
        Route::post('pos', 'posController@store');
        Route::get('pos/get-state-list','posController@getStateList');
        Route::get('pos/get-city-list','posController@getCityList');

        Route::get('logins/', 'loginController@index');
        Route::get('login/create_login', 'loginController@create');
        Route::post('login/create_login', 'loginController@store');
        Route::get('login/delete/{id}', 'loginController@delete');

        Route::get('upload', 'uploadController@index');
        Route::post('upload', 'uploadController@upload');
        Route::get('upload/delete/{id}', 'uploadController@delete');


        Route::get('orders', 'ordersController@index');
        Route::get('order/show/{id}', 'ordersController@show');
        Route::get('order/delete/{id}', 'ordersController@delete');
        Route::post('order/deleteall', 'ordersController@deleteall');

        Route::get('order/mail/','ordersController@mail');
        // PDF & EXCEL SHEET ROUTES
        Route::get('orders/order_pdf/{id}/', 'pdf_excelController@order_pdf');
        Route::get('pdf_formate/', 'pdf_excelController@pdf')->name('pdf_formate');
        Route::get('excel_formate/', 'pdf_excelController@excel')->name('excel_formate');
        Route::post('import_excel/', 'pdf_excelController@import_excel')->name('import_excel');

        // Settings
        Route::get('general/','settingsController@index');
        Route::post('general/', 'settingsController@store');
        Route::get('controls/','settingsController@control_index');

        Route::resource('calendar', 'calendarsController');
        Route::post('calendar', 'calendarsController@store');
        Route::post('calendar/edit', 'calendarsController@update');
        Route::post('calendar/delete', 'calendarsController@remove');

        // AJAX
        Route::get('ajax', 'bulkControlller@index');
        Route::post('ajax',array('as'=>'dropzone.uploadfile','uses'=>'bulkControlller@store')) ;

        Route::get('university','universityController@index');
        Route::post('university','universityController@create');


        Route::get('payment', 'paymentController@index');
        Route::post('payment', ['as'=>'payment','uses'=>'paymentController@post']);


   });
