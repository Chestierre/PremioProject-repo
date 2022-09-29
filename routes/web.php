<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\UnitController;
use App\Http\Controllers\Admin\PromoController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\UnitimageController;
use App\Http\Controllers\Admin\SMSController;
use App\Http\Controllers\Admin\CollectorController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\AdminCustomerController;
use App\Http\Controllers\mocksms;

Route::get('/', [App\Http\Controllers\WelcomeController::class, 'index'])->name('welcome') -> middleware('welcomeauthmiddleware');

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::view('/pdfOrder', 'admin.order.pdfOrder');

Route::group(['middleware' => 'auth'],function(){
    Route::group([
        'prefix' => 'admin',
        'middleware' => 'is_admin',
        'as' => 'admin.'
    ], function () {

        Route::get('/user/password/{user}/edit', [UserController::class, 'password_edit'])->name('password_edit');
        Route::put('/user/password/{user}', [UserController::class, 'password_update'])->name('password_update');
        Route::delete('userDeleteAll', [UserController::class, 'deleteAll']);
        Route::post('/admin/user/search', [UserController::class, 'search'])->name('user.search');
        Route::post('/user/adminstore', [UserController::class, 'adminstore'])->name('user.adminstore');
        Route::get('user/getuser/{id}', [UserController::class, 'getuser'])->name('user.getuser');
        Route::get('user/getcustomeruserrelation/{id}', [UserController::class, 'getcustomeruserrelation'])->name('user.getcustomeruserrelation');
        Route::resource('user', UserController::class);

        Route::resource('unit', UnitController::class);
        Route::post('/admin/unit/search', [UnitController::class, 'search'])->name('unit.search');
        Route::get('/user/password/{user}/image_add', [UnitimageController::class, 'image_add'])->name('image_add');
        Route::delete('unitDeleteAll', [UnitController::class, 'deleteAll']);
        Route::post('/unit/{unit}/variationStore', [UnitController::class, 'variationStore'])->name('unit.variationStore');

        Route::resource('promo', PromoController::class);
        Route::post('/admin/promo/search', [PromoController::class, 'search'])->name('promo.search');
        Route::delete('promoDeleteAll', [PromoController::class, 'deleteAll']);

        Route::resource('brand', BrandController::class);

        Route::post('order/{order}/pay', [OrderController::class, 'pay'])->name('order.pay');
        Route::post('/admin/order/search', [OrderController::class, 'search'])->name('order.search');
        Route::delete('orderDeleteAll', [OrderController::class, 'deleteAll']);
        Route::get('pdfOrderHistory/{order}', [OrderController::class, 'pdfOrderHistory'])->name('order.pdfOrderHistory');
        Route::post('pdfOrderHistoryByDate/{order}', [OrderController::class, 'pdfOrderHistoryByDate'])->name('order.pdfOrderHistoryByDate');
        Route::get('queryPrice/{id}', [OrderController::class, 'queryPrice'])->name('order.queryPrice');
        Route::resource('order', OrderController::class);

        Route::resource('SMS', SMSController::class);
        
        Route::resource('collector', CollectorController::class);
        Route::get('collector/{order}/orderEdit', [CollectorController::class, 'orderEdit'])->name('collector.orderEdit');
        Route::post('collector/{user}/{order}/unassignOrder', [CollectorController::class, 'unassignOrder'])->name('collector.unassignOrder');
        Route::post('/admin/brand/try', [BrandController::class, 'try'])->name('brand.try');

        Route::get('admincustomer/createCustomer/{user}', [AdminCustomerController::class, 'createCustomer'])->name('admincustomer.createCustomer');
        Route::post('admincustomer/storeCustomer/{user}', [AdminCustomerController::class, 'storeCustomer'])->name('admincustomer.storeCustomer');
        Route::resource('admincustomer', AdminCustomerController::class);
    });

    Route::group([
        'prefix' => 'customer',
        'as' => 'customer.'
    ], function () {
        Route::resource('customer', App\Http\Controllers\Customer\CustomerController::class, ['except' => ['store']]) -> middleware(['ensurecustomerdetails']);
        Route::resource('customer', App\Http\Controllers\Customer\CustomerController::class, ['only' => ['store']]);
        Route::get('/CustomerDetails', function () {return view('CustomerRequestDetails');})->name('CustomerRequestDetails');
        Route::get('/FillOutform', function () {
            $id = Auth::id();
            return view('FillOutform', compact('id'));
        })->name('FillOutform');;                                                
    });

    Route::group([
        'prefix' => 'collector',
        'as' => 'collector.'
    ], function () {
        Route::resource('collector', CollectorController::class);
    });
    

});

