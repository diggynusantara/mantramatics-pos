<?php

Route::get('/', function() {
    return redirect(route('login'));
});

Auth::routes();

Route::group(['middleware' => 'auth'], function() {

    Route::get('/home', 'HomeController@index')->name('home');

    Route::group(['middleware' => ['role:admin']], function () {
        Route::resource('/role', 'RoleController')->except([
            'create', 'show', 'edit', 'update'
        ]);

        Route::resource('/users', 'UserController')->except([
            'show'
        ]);

        Route::get('/users/roles/{id}', 'UserController@roles')->name('users.roles');
        Route::put('/users/roles/{id}', 'UserController@setRole')->name('users.set_role');
        Route::post('/users/permission', 'UserController@addPermission')->name('users.add_permission');

        // Sengaja tdk di tulis "/users/role-permission"
        Route::get('/rolperm', 'UserController@rolePermission')->name('users.roles_permission');

        Route::put('/users/permission/{role}', 'UserController@setRolePermission')->name('users.setRolePermission');
    });

    Route::group(['middleware' => ['permission:show products|create products|delete products']], function() {
        Route::resource('/kategori', 'CategoryController')->except([
            'create', 'show'
        ]);
        Route::resource('/produk', 'ProductController');
    });

    Route::group(['middleware' => ['role:admin|cashier']], function() {
        Route::get('/transaksi', 'OrderController@addOrder')->name('order.transaksi');
        Route::get('/checkout', 'OrderController@checkout')->name('order.checkout');
        Route::post('/checkout', 'OrderController@storeOrder')->name('order.storeOrder');

        Route::get('/order', 'OrderController@index')->name('order.index');
        Route::get('/order/pdf/{invoice}', 'OrderController@invoicePdf')->name('order.pdf');
        Route::get('/order/excel/{invoice}', 'OrderController@invoiceExcel')->name('order.excel');
    });

    Route::get('/profile', 'ProfileController@index')->name('profile.index');
    Route::get('/profile/{user}', 'ProfileController@edit')->name('profile.edit');
    Route::patch('/profile/{user}/update', 'ProfileController@update')->name('profile.update');

    Route::get('/profile/changepass/{user}', 'ProfileController@editPassword')->name('profile.editpassword');
    Route::patch('/profile/changepass/{user}/update', 'ProfileController@updatePassword')->name('profile.updatepassword');

});
