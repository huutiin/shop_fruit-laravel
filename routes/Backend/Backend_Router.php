<?php

use App\Http\Controllers\Product_controller;
use Illuminate\Support\Facades\Route;
    //Trang dang nhap
    Route::get('/admin','BackendController@loginadmin')->name('login');
    Route::get('/logout','BackendController@log_out')->name('logout');

    Route::get('/admin-dashboard','BackendController@admin_dashboard')->name('index');
    Route::post('/dashboard','BackendController@dashboard')->name('dashboard');
    Route::get('/error','BackendController@error')->name('error');

    //Category Product Route
    Route::get('/add-category-product','CategoryController@add_category_product')->name('add_category_product');
    Route::post('/save-category-product','CategoryController@save_category_product')->name('save_category_product');
    
    Route::get('/all-category-product','CategoryController@all_category_product')->name('all_category_product');

    Route::get('/active-category/{category_productid}','CategoryController@active_category')->name('active_category');
    Route::get('/unactive-category/{category_productid}','CategoryController@unactive_category')->name('unactive_category');

    Route::get('/edit-category-product/{category_productid}','CategoryController@edit')->name('edit_category_product');
    Route::post('/update-category-product/{category_productid}','CategoryController@update')->name('update_category_product');
    Route::get('/delete-category-product/{category_productid}','CategoryController@destroy')->name('delete_category_product');
    
    //Product Route 
    Route::get('/add-product','Product_controller@index')->name('add_product');
    Route::post('/create-product','Product_controller@create')->name('create_product');

    Route::get('/all-product','Product_controller@show')->name('all_product');

    Route::get('/active-product/{product_id}','Product_controller@active_product')->name('active_product');
    Route::get('/unactive-product/{product_id}','Product_controller@unactive_product')->name('unactive_product');

    Route::get('/edit-product/{product_id}','Product_controller@edit')->name('edit_product');
    Route::post('/update-product/{product_id}','Product_controller@update')->name('update_product');
    Route::get('/delete-product/{product_id}','Product_controller@destroy')->name('delete_product');

    // Brand Route
    Route::get('/add-brand-product','BrandController@add_brand_product')->name('add_brand_product');
    Route::post('/save-brand-product','BrandController@save_brand_product')->name('save_brand_product');

    Route::get('/all-brand-product','BrandController@all_brand_product')->name('all_brand_product');

    Route::get('/active-brand/{brand_id}','BrandController@active_brand')->name('active_brand');
    Route::get('/unactive-brand/{brand_id}','BrandController@unactive_brand')->name('unactive_brand');

    Route::get('/edit-brand/{brand_id}','BrandController@edit')->name('edit_brand_product');
    Route::post('/update-brand/{brand_id}','BrandController@update')->name('update_brand_product');
    Route::get('/delete-brand/{brand_id}','BrandController@destroy')->name('delete_brand_product');
?>