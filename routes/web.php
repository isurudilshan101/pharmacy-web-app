<?php

use App\Http\Controllers\NewUserController;
use App\Http\Controllers\PharmacyUserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
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
})->name('welcome');

Route::get('/aboutus', function () {
    return view('about_us');
})->name('aboutus_view');

Route::get('/contactus', function () {
    return view('contact_us');
})->name('contactus_view');

Route::get('/user_register_view', function () {
    return view('user_register');
})->name('user_register_view');

Route::get('/user_login_view', function () {
    return view('user_login');
})->name('user_login_view');

Route::get('/admin_login_view', function () {
    return view('admin_login');
})->name('admin_login_view');


Route::post('/user_register', [NewUserController::class, 'store'])->name('user_register');

Route::post('/login', [NewUserController::class, 'login'])->name('login');
Route::get('/user_dashboard', [NewUserController::class, 'user_dashboard_view'])->name('user_dashboard');

Route::post('/submit_prescription', [NewUserController::class, 'submit_prescription'])->name('submit_prescription');

Route::get('/thank_prescriptions', function () {
    return view('thank_prescriptions');
})->name('thank_prescriptions');

//admin_login

Route::post('/admin_login', [PharmacyUserController::class, 'admin_login'])->name('admin_login');

//pha_user_dashboard
// Route::GET('/pha_user_dashboard', [PharmacyUserController::class, 'view_pha_user_dashboard'])->name('pha_user_dashboard');

// Route::post('/products', 'ProductController@index')->name('products.index');

Route::get('/prescriptions_view/{user_id}', [PharmacyUserController::class, 'view'])->name('prescriptions_view');
Route::get('/prescription_bill', [PharmacyUserController::class, 'prescription_bill'])->name('prescription_bill');

Route::get('/send_quotation/{user_id}', [PharmacyUserController::class, 'send_quotation'])->name('send_quotation');

//Accept, Reject precription email
// Route::get('/quotation/accept/{user_id}', [PharmacyUserController::class, 'reject'])->name('quotation.accept');
// Route::get('/quotation/reject/{user_id}', [PharmacyUserController::class, 'accept'])->name('quotation.reject');
