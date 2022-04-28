<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::view('/customerinfo', 'customerinfo')->name('customerinfo');

            

Route::group(['middleware' => 'auth'],function(){
    Route::group([
        'prefix' => 'admin',
        'middleware' => 'is_admin',
        'as' => 'admin.'
    ], function () {
        Route::get('/user/password/{user}/edit', [UserController::class, 'password_edit'])->name('password_edit');
        Route::put('/user/password/{user}', [UserController::class, 'password_update'])->name('password_update');
        Route::resource('user', UserController::class);
    });
    
    Route::group([
        'prefix' => 'customer',
        'as' => 'customer.'
    ], function () {
        Route::resource('customer', App\Http\Controllers\Customer\CustomerController::class, ['except' => ['store']]) -> middleware(['ensurecustomerdetails']);
        Route::resource('customer', App\Http\Controllers\Customer\CustomerController::class, ['only' => ['store']]);
        Route::get('/CustomerDetails', function () {return view('CustomerRequestDetails');})->name('CustomerRequestDetails');;    
    });
    
    

});


