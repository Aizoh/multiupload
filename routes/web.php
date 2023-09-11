<?php

use App\Http\Controllers\ConfirmOrderController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
//Route::get('/confirm-orders', 'ConfirmOrderController@store');
//Route::get('/orders', [ConfirmOrderController::class, 'store']);

Route::get('/email', [ConfirmOrderController::class, 'sendOrderConfirmationEmail'])
    ->name('send.order.confirmation.email');
Route::get('/confirm', [ConfirmOrderController::class, 'index'])->name('confirm-order.index');
Route::post('/send', [ConfirmOrderController::class, 'store'])->name('confirm-order.store');
// Route::post('/send/{order_id}', [ConfirmOrderController::class, 'store'])->name('confirm-order.store');
//Route::match(['get', 'post'], '/send', [ConfirmOrderController::class, 'store'])->name('confirm-order.store');


//Route::get('/home', 'ConfirmOrderController@index')->name('home');

// Route::controller(ConfirmOrderController::class)->group(function(){
//     Route::get('/order', 'store')->name('emails.send');

// });

//PREVIEW EMAIL
Route::get('/mailable', function () {
    $confirmorder = App\Models\ConfirmOrder::find(2);
    return new App\Mail\Confirm($confirmorder);
});

Route::controller(FileController::class)->group(function(){
    Route::get('file-upload', 'index')->name('file.index');
    Route::post('file-upload', 'store')->name('file.store');
});
