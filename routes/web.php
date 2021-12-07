<?php

use App\Models\Staff;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DailyReportController;
use App\Http\Controllers\FullCalendarEventMasterController;
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
// Route::group(['middleware' => ['guest']], function() {
//     Route::get('login', [UserController::class, 'login_page'])->name('login');
//     Route::post('login', [UserController::class, 'login'])->name('user.login');
// });

// Route::group(['middleware' => ['auth']], function() {
    // Route::get('logout', [UserController::class, 'logout'])->name('user.logout');


    // });

/* start user */
Route::get('/user', [UserController::class, 'index'])->name('user.index');

Route::get('/user/create',[UserController::class, 'create'])->name('user.create');
Route::post('/user/store', [UserController::class, 'store'])->name('user.store');
Route::get('/user/{id}',[UserController::class, 'edit'])->name('user.edit');
Route::get('/user/search', [UserController::class, 'getSearch'])->name('user.search');
Route::get('/user/{id}',[UserController::class, 'edit'])->name('user.edit');
Route::put('/user/{id}/update',[UserController::class, 'update'])->name('user.update');

/* end user */
/* start dashboard */

require "event-api.php";