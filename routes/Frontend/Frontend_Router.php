<?php 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\ShopController;
    //Get View
    Route::get('/','FrontendController@index')->name('home');
    Route::get('/about','FrontendController@about')->name('about');
    Route::get('/cart','FrontendController@cart')->name('cart');
    Route::get('/checkout','FrontendController@checkout')->name('checkout');
    Route::get('/contact','FrontendController@contact')->name('contact');
    Route::get('/error','FrontendController@error')->name('error');

    //Shop and Product
    Route::get('/shop', [ShopController::class, 'index'])->name('shop');
    Route::get('/product_detail/{product_id}',[ShopController::class, 'show_detail'])->name('product_detail');
    Route::get('/product-in-category/{category_id}',[ShopController::class, 'product_in_category'])->name('product_in_category');
    
    //Cart
    Route::post('/add-to-cart','FrontendController@cart')->name('add_cart');
?>