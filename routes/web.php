<?php

use App\Http\Controllers\ConfirmOrderController;
use App\Http\Controllers\FileController;
use Illuminate\Support\Facades\Route;
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

// Route::controller(FileController::class)->group(function(){
//     Route::get('file','index')->name('file.index');
//     Route::post('file-upload', 'store')->name('file.store');
//     Route::get('myfiles', 'showmyfiles')->name('file.myfile');
//     Route::post('filesjson', 'showmyfilesJson')->name('files.json');
//     Route::get('file/{id}', 'show')->name('file.file');
//     Route::get('filejson/{id}', 'showfileJson')->name('file.json');
//     Route::get('myrequest', 'my_request')->name('file.myrequest');
//     Route::get('myuser', 'my_user')->name('user.myuser');
   

// });


Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('auth');
Route::get('/users', [UserController::class, 'index'])->name('users')->middleware('auth');
Route::put('/users/{user}/assign-roles',  [UserController::class, 'assignRoles'])->name('assign-roles');


// routes/web.php

Route::get('/roles', [RoleController::class, 'index'])->name('roles.index');
Route::get('/roles/create', [RoleController::class, 'create'])->name('roles.create');
Route::post('/roles', [RoleController::class, 'store'])->name('roles.store');


// Define authentication routes using Auth::routes()
Auth::routes();

// Define other custom routes
Route::group(['middleware' => 'auth'], function () {
    Route::get('file', [FileController::class, 'index'])->name('file.index');
    Route::post('file-upload', [FileController::class,'store'])->name('file.store');
    Route::get('myfiles', [FileController::class,'showmyfiles'])->name('file.myfile');
    Route::post('filesjson', [FileController::class, 'showmyfilesJson'])->name('files.json');
    Route::get('file/{id}', [FileController::class, 'show'])->name('file.file');
    Route::get('filejson/{id}',[FileController::class, 'showfileJson'])->name('file.json');
    Route::get('myrequest', [FileController::class, 'my_request'])->name('file.myrequest');
    Route::get('myuser', [FileController::class, 'my_user'])->name('user.myuser');
});

use App\Http\Controllers\ProductController;


Route::get('products', [ProductController::class,'index'])->name('products.index');
  
Route::get('products/create-step-one', [ProductController::class,'createStepOne'])->name('products.create.step.one');

Route::post('products/create-step-one', [ProductController::class,'postCreateStepOne'])->name('products.create.step.one.post');

Route::get('products/create-step-two', [ProductController::class,'createStepTwo'])->name('products.create.step.two');

Route::post('products/create-step-two', [ProductController::class,'postCreateStepTwo'])->name('products.create.step.two.post');

Route::get('products/create-step-three', [ProductController::class,'createStepThree'])->name('products.create.step.three');

Route::post('products/create-step-three', [ProductController::class,'postCreateStepThree'])->name('products.create.step.three.post');

Route::post('/clear-section-data', [ProductController::class, 'clearSectionData']);


