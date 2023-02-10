<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeEmployeeController;
use App\Http\Controllers\ListTimekeepingController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Api\ProductController;

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
Route::resource('/listEmployee', HomeEmployeeController::class);
Route::get('/listTimekeeping',[ListTimekeepingController::class, 'getTimekeeping']);
Route::post('/export-csv',[ListTimekeepingController::class, 'export_csv']);
Route::post('/import-csv',[ListTimekeepingController::class, 'import_csv']);
Route::get('/', function () {
    return view('welcome');
});
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

//Route::get('/login', [AuthenticatedSessionController::class, 'create'])->middleware('auth')->name('dashboard');

// Route::apiResource('/products', ProductController::class);

Route::resource('chirp', LoginController::class)
    ->only(['index', 'store'])
    ->middleware(['auth', 'verified']);
require __DIR__.'/auth.php';
