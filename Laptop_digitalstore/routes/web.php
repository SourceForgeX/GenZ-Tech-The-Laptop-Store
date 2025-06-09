<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CustomerhomeController;
use App\Http\Controllers\CustomerLoginController;
use App\Http\Controllers\CustomerviewController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\LaptopController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ModelController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;

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
Route::get('AdminHome', [AdminController::class, 'AdminHome'])->name('AdminHome');

Route::get('location', [LocationController::class, 'Location'])->name('Location');
Route::post('location_insert', [LocationController::class, 'location_insert'])->name('location_insert');
Route::get('viewlocation', [LocationController::class, 'viewlocation'])->name('viewlocation');
Route::get('/getlocation/{ddldistrict}', [LocationController::class, 'getlocation']);
Route::get('editlocation/{locationid}', [LocationController::class, 'editlocation'])->name('editlocation');
Route::post('update_location/{locationid}', [LocationController::class, 'update_location'])->name('update_location');
Route::get('deletelocation/{locationid}', [LocationController::class, 'deletelocation'])->name('deletelocation');




Route::get('brand', [BrandController::class, 'brand'])->name('brand');
Route::post('brand_insert', [BrandController::class, 'brand_insert'])->name('brand_insert');
Route::get('viewbrand', [BrandController::class, 'viewbrand'])->name('viewbrand');
Route::get('editbrand/{brandid}', [BrandController::class, 'editbrand'])->name('editbrand');
Route::post('update_brand/{brands}', [BrandController::class, 'update_brand'])->name('update_brand');
Route::get('deletebrand/{brandid}', [BrandController::class, 'deletebrand'])->name('deletebrand');




Route::get('model', [ModelController::class, 'model'])->name('model');
Route::post('model_insert', [ModelController::class, 'model_insert'])->name('model_insert');
Route::get('viewmodel', [ModelController::class, 'viewmodel'])->name('viewmodel');
Route::get('/getmodel/{ddlbrand}', [ModelController::class, 'getmodel'])->name('getmodel');

Route::get('editmodel/{modelid}', [ModelController::class, 'editmodel'])->name('editmodel');
Route::post('update_model/{modelid}', [ModelController::class, 'update_model'])->name('update_model');
Route::get('deletemodel/{modelid}', [ModelController::class, 'deletemodel'])->name('deletemodel');



Route::get('Laptop', [LaptopController::class, 'Laptop'])->name('Laptop');
Route::post('laptop_insert', [LaptopController::class, 'laptop_insert'])->name('laptop_insert');
Route::get('viewlaptop', [LaptopController::class, 'viewlaptop'])->name('viewlaptop');
Route::get('/getlaptop/{ddlmodel}', [LaptopController::class, 'getlaptop']);
Route::get('addstock/{laptopid}', [LaptopController::class, 'addstock'])->name('addstock');
Route::get('editlaptop/{laptopid}', [LaptopController::class, 'editlaptop'])->name('editlaptop');
Route::post('update_stock/{laptopid}', [LaptopController::class, 'update_stock'])->name('update_stock');

Route::post('update_laptop/{laptopid}', [LaptopController::class, 'update_laptop'])->name('update_laptop');
Route::get('deletelaptop/{laptopid}', [LaptopController::class, 'deletelaptop'])->name('deletelaptop');




Route::get('', [GuestController::class, 'GuestHome'])->name('GuestHome');

Route::get('customerreg', [CustomerController::class, 'customerreg'])->name('customerreg');
Route::get('/getlocation/{district}', [CustomerController::class, 'getlocation']);
Route::post('customer_insert', [CustomerController::class, 'customer_insert'])->name('customer_insert');


Route::get('adminlogin', [AdminLoginController::class, 'adminlogin'])->name('adminlogin');
Route::post('adminlogin_process', [AdminLoginController::class, 'adminlogin_process'])->name('adminlogin_process');

Route::get('customerlogin', [CustomerLoginController::class, 'customerlogin'])->name('customerlogin');
Route::post('customerlogin_process', [CustomerLoginController::class, 'customerlogin_process'])->name('customerlogin_process');


Route::get('customerhome', [CustomerhomeController::class, 'customerhome'])->name('customerhome');
Route::get('brandview', [CustomerviewController::class, 'brandview'])->name('brandview');
Route::get('laptopview/{bid}', [CustomerviewController::class, 'laptopview'])->name('laptopview');
Route::get('/getlaptop/{modelid}', [CustomerviewController::class, 'getlaptop']);
Route::get('viewmorelaptop/{laptopid}', [CustomerviewController::class, 'viewmorelaptop'])->name('viewmorelaptop');
Route::post('booking', [CustomerviewController::class, 'booking'])->name('booking');



Route::get('payment/{id}', [PaymentController::class, 'payment'])->name('payment');
Route::post('payment_insert', [PaymentController::class, 'payment_insert'])->name('payment_insert');
Route::get('paymentview', [PaymentController::class, 'paymentview'])->name('paymentview');
Route::get('viewmoredetails/{paymentid}', [PaymentController::class, 'viewmoredetails'])->name('viewmoredetails');
Route::get('delivered/{bookingid}', [PaymentController::class, 'delivered'])->name('delivered');
Route::get('confirm/{bookingid}', [PaymentController::class, 'confirm'])->name('confirm');





Route::get('myrequest', [CustomerviewController::class, 'myrequest'])->name('myrequest');


Route::get('logout', [LogoutController::class, 'logout'])->name('logout');



Route::get('laptopbookingcountreport', [ReportController::class, 'laptopbookingcountreport'])->name('laptopbookingcountreport');
// Route::get('laptopbookingcountreport', [AdminController::class, 'laptopbookingcountreport'])->name('laptopbookingcountreport');
Route::get('datewiselaptopbookingreport', [ReportController::class, 'datewiselaptopbookingreport'])->name('datewisebooking');
Route::get('paymentreport', [ReportController::class, 'paymentreport'])->name('paymentreport');


Route::get('currentyearreport', [AdminController::class, 'currentyearreport'])->name('currentyearreport');
Route::get('viewmore/{month}', [AdminController::class, 'viewmore'])->name('viewMore');









