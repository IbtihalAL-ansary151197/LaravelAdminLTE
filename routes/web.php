<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth;
use App\Http\Controllers\Auth\customAuthController;
use App\Http\Controllers\Admin\AdminAuthController;
// use App\Http\Middleware\CheckMessages;

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
 
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth:admin'])->name('dashboard');




Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
    Route::get('/login', [AdminAuthController::class, 'getLogin'])->name('adminLogin');
    Route::post('/login', [AdminAuthController::class, 'postLogin'])->name('adminLoginPost');
 
    Route::group(['middleware' => 'adminauth'], function () {
        Route::get('/', function () {
            return view('welcome');
        })->name('adminDashboard');
 
    });
});








// Route::get('/admin/login', [AuthController::class, 'adminLogin'])->name('admin.login');
// Route::post('/admin/login', [AuthController::class, 'adminHandleLogin'])->name('admin.login.handle');

// Route::get('logout', function(){
//     \Illuminate\Support\Facades\Auth::logout();
//     return redirect()->route('login');
// })->middleware('auth');












    // Route::get('site', [customAuthController::class, 'site'])->name('site'); 
    // Route::get('admin', [\App\Http\Auth\customAuthController::class, 'admin'])->name('admin'); 

 
require __DIR__.'/auth.php';
