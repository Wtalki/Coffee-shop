<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReviewsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BookTableController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\ContactShopController;


Route::middleware(['auth:sanctum'])->group(function () {

    Route::get('/dashboard',[AuthController::class, 'dashboard'])->name('dashboard');
    //admin
    Route::middleware(['admin_auth'])->group(function () {
        Route::prefix('admin')->group(function () {

            //admin account details
            Route::get('/account/details',[AdminController::class, 'accountDetails'])->name('account#details');
            Route::get('/account/editPage',[AdminController::class, 'accountEditPage'])->name('account#editPage');
            Route::post('/account/edit', [AdminController::class, 'accountEdit'])->name('account#edit');

            //admin password change
            Route::get('changePassword', [AdminController::class, 'passwordChange'])->name('password#change');
            Route::post('changePassword',[AdminController::class, 'changePassword'])->name('change#password');
            //amdin list
            Route::get('/list', [AdminController::class, 'list'])->name('admin#list');
            Route::get('/changeRole', [AdminController::class, 'changeRole'])->name('amdin#changeRole');
            Route::get('/delete/{id}',[AdminController::class, 'delete'])->name('admin#delete');

            //user list
            Route::get('user/list', [HomeController::class, 'userList'])->name('user#list');
            Route::get('change/role',[HomeController::class, 'changeRole'])->name('user#changeRole');
            // admin dashboard
            Route::get('/dashboard', [HomeController::class, 'adminDashboard'])->name('admin#dashboard');

            // category list
            Route::get('/category/list',[CategoryController::class, 'categoryList'])->name('category#list');
            Route::get('category/createPage',[CategoryController::class, 'categoryCreatePage'])->name('category#createPage');
            Route::post('category/create',[CategoryController::class, 'categoryCreate'])->name('category#create');
            Route::get('category/delete/{id}',[CategoryController::class, 'categoryDelete'])->name('category#delete');
            Route::get('category/editPage{id}',[CategoryController::class, 'categoryEditPage'])->name('category#editPage');
            Route::post('category/edit',[CategoryController::class, 'categoryEdit'])->name('category#edit');

            // product list
            Route::get('product/listPage', [ProductController::class, 'productListPage'])->name('product#listPage');
            Route::get('product/createPage', [ProductController::class, 'productCreatePage'])->name('product#createPage');
            Route::post('product/create', [ProductController::class, 'productCreate'])->name('product#create');
            Route::get('product/delete/{id}',[ProductController::class, 'productDelete'])->name('product#delete');
            Route::get('product/editPage/{id}',[ProductController::class, 'productEditPage'])->name('product#editPage');
            Route::post('product/edit', [ProductController::class, 'productEdit'])->name('product#edit');
            Route::get('product/detail/{id}',[ProductController::class,'productDetail'])->name('product#detail');
            //booking list
            Route::get('/booking/list', [BookTableController::class, 'bookingList'])->name('booking#list');
            Route::get('/booking/status', [BookTableController::class, 'bookingStatus'])->name('booking#status');

            Route::get('contact/list',[ContactController::class,'contactList'])->name('contact#list');
            Route::get('contact/delete/{id}',[ContactController::class, 'contactDelete'])->name('contact#delete');
            Route::get('order',[OrderController::class, 'order'])->name('user#order');
            Route::get('order/status',[OrderController::class, 'orderStatus'])->name('order#status');
            Route::get('order/details/{orderCode}',[OrderController::class, 'orderDetails'])->name('order#details');
        });
    });

    Route::middleware(['user_auth'])->group(function () {
         //user
    Route::prefix('user')->group(function () {
        //user account
        Route::get('/account/details', [UserController::class, 'accountDetails'])->name('user#accountDetails');
        Route::get('/account/edit', [UserController::class, 'accountEdit'])->name('user#accountEdit');
        Route::post('account/update',[UserController::class, 'accountUpdate'])->name('user#accountUpdate');

        //password change
        Route::get('password/change/page', [UserController::class, 'passwordChangePage'])->name('user#passwordChangePage');
        Route::post('password/change',[UserController::class, 'passwordChange'])->name('user#passwordChange');
        // appointment
        Route::get('/appointment', [BookTableController::class, 'appointment'])->name('appointment');
        //review
        Route::get('/review', [ReviewsController::class, 'review'])->name('user#review');

        //product single
        Route::get('/product/singlePage/{id}', [MenuController::class, 'productSinglePage'])->name('product#singlePage');
        Route::get('product/add/cart',[MenuController::class, 'productAdd'])->name('product#add');
        Route::get('product/orderPage',[MenuController::class, 'productOrderPage'])->name('product#orderPage');
        Route::get('delete/current/cart',[MenuController::class,'deleteCurrentCart'])->name('delete#currentCart');
        Route::get('product/order',[MenuController::class, 'productOrder'])->name('product#order');

        Route::get('order/listPage',[OrderController::class,'orderListPage'])->name('order#listPage');

        //contact
            Route::post('contact', [ContactController::class, 'contact'])->name('user#contact');

            //cash
            Route::get('cash',[OrderController::class,'cash'])->name('user#cash');
    });
    });

});


Route::middleware(['user_auth'])->group(function () {
    Route::get('home', function () {
        return view('user.main.home');
    });
    Route::get('/',[UserController::class,'userHome'])->name('user#main');
    //review page
    Route::get('review',[ReviewsController::class,'reviewPage'])->name('user#reviewPage');

    //menu page
    Route::get('/menuPage',[MenuController::class,'menuPage'])->name('user#menuPage');
    Route::get('category/filter',[MenuController::class,'categoryFilter'])->name('category#filter');
    // service page
    Route::get('service',[UserController::class,'userService'])->name('user#service');
    //about page
    Route::get('about',[UserController::class,'userAbout'])->name('user#about');
    //contact page
    Route::get('contact',[ContactController::class,'contactPage'])->name('user#contactPage');
    Route::get('view/count', [UserController::class, 'userView'])->name('user#view');


});

Route::middleware(['admin_auth'])->group(function () {
    Route::get('loginPage', [AuthController::class, 'loginPage'])->name('login#page');
Route::get('registerPage', [AuthController::class, 'registerPage'])->name('register#page');
});
