<?php

use App\Http\Controllers\ConfirmOrderController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;

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

//send email
Route::get('/email', [ConfirmOrderController::class, 'sendOrderConfirmationEmail'])->name('sendemail');

//Redirect when email is succesfully sent
Route::get('/confirm', [ConfirmOrderController::class, 'index'])->name('confirm-order.index');
//Route::post('/send', [ConfirmOrderController::class, 'store'])->name('confirm-order.store');


//PREVIEW EMAIL
Route::get('/preview', function () {
    $confirmorder = App\Models\ConfirmOrder::find(1);
    return new App\Mail\Confirm($confirmorder);
});

//file upload actions

Route::controller(FileController::class)->group(function(){
    Route::get('file-upload', 'index')->name('file.index');
    Route::post('file-upload', 'store')->name('file.store');
    Route::get('myfiles', 'showmyfiles')->name('file.myfile');
});



Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('auth');
Route::get('/users', [UserController::class, 'index'])->name('users')->middleware('auth');
Route::put('/users/{user}/assign-roles',  [UserController::class, 'assignRoles'])->name('assign-roles');


// routes/web.php

Route::get('/roles', [RoleController::class, 'index'])->name('roles.index');
Route::get('/roles/create', [RoleController::class, 'create'])->name('roles.create');
Route::post('/roles', [RoleController::class, 'store'])->name('roles.store');


Auth::routes();