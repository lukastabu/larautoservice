<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AutoserviceController as A;
use App\Http\Controllers\MechanicController as M;
use App\Http\Controllers\RepairController as R;
use App\Http\Controllers\OrderController as O;
use App\Http\Controllers\FrontController as F;


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

// FRONT ROUTER

Route::get('', [F::class, 'index'])->name('front-index');

Route::get('/front/show/{id}', [F::class, 'show'])->name('front-show')->middleware('rw:user');


// AUTOSERVICE ROUTERS

Route::get('/autoservices', [A::class, 'index'])->name('autoservice-index')->middleware('rw:admin');

Route::get('/autoservices/create', [A::class, 'create'])->name('autoservice-create')->middleware('rw:admin');

Route::post('/autoservices', [A::class, 'store'])->name('autoservice-store')->middleware('rw:admin');

Route::get('/autoservices/edit/{autoservice}', [A::class, 'edit'])->name('autoservice-edit')->middleware('rw:admin');

Route::put('/autoservices/{autoservice}', [A::class, 'update'])->name('autoservice-update')->middleware('rw:admin');

Route::delete('/autoservices/{autoservice}', [A::class, 'destroy'])->name('autoservice-delete')->middleware('rw:admin');

Route::get('/autoservices/show/{id}', [A::class, 'show'])->name('autoservice-show')->middleware('rw:user');


// MECHANIC ROUTERS

Route::get('/mechanics', [M::class, 'index'])->name('mechanic-index')->middleware('rw:admin');

Route::get('/mechanics/create', [M::class, 'create'])->name('mechanic-create')->middleware('rw:admin');

Route::post('/mechanics', [M::class, 'store'])->name('mechanic-store')->middleware('rw:admin');

Route::get('/mechanics/edit/{mechanic}', [M::class, 'edit'])->name('mechanic-edit')->middleware('rw:admin');

Route::put('/mechanics/{mechanic}', [M::class, 'update'])->name('mechanic-update')->middleware('rw:admin');

Route::delete('/mechanics/{mechanic}', [M::class, 'destroy'])->name('mechanic-delete')->middleware('rw:admin');

Route::get('/mechanics/show/{id}', [M::class, 'show'])->name('mechanic-show')->middleware('rw:admin');


// REPAIR ROUTERS

Route::get('/repairs', [R::class, 'index'])->name('repair-index')->middleware('rw:admin');

Route::get('/repairs/create', [R::class, 'create'])->name('repair-create')->middleware('rw:admin');

Route::post('/repairs', [R::class, 'store'])->name('repair-store')->middleware('rw:admin');

Route::get('/repairs/edit/{repair}', [R::class, 'edit'])->name('repair-edit')->middleware('rw:admin');

Route::put('/repairs/{repair}', [R::class, 'update'])->name('repair-update')->middleware('rw:admin');

Route::delete('/repairs/{repair}', [R::class, 'destroy'])->name('repair-delete')->middleware('rw:admin');

Route::get('/repairs/show/{id}', [R::class, 'show'])->name('repair-show')->middleware('rw:admin');


// ORDER ROUTERS

Route::get('/orders', [O::class, 'index'])->name('order-index')->middleware('rw:admin');

Route::get('/orders/create', [O::class, 'create'])->name('order-create')->middleware('rw:user');

Route::get('/orders/submit/{id}', [O::class, 'submit'])->name('order-submit')->middleware('rw:user');

Route::post('/orders', [O::class, 'store'])->name('order-store')->middleware('rw:admin');

Route::get('/orders/edit/{order}', [O::class, 'edit'])->name('order-edit')->middleware('rw:admin');

Route::put('/orders/{order}', [O::class, 'update'])->name('order-update')->middleware('rw:admin');

Route::delete('/orders/{order}', [O::class, 'destroy'])->name('order-delete')->middleware('rw:admin');

Route::get('/orders/show/{id}', [O::class, 'show'])->name('order-show')->middleware('rw:user');

