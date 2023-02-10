<?php

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\EmployeeController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\HomeEmployeeController;
use App\Http\Controllers\Api\ListEmployeeController;
use App\Http\Controllers\Api\demoController;
use App\Http\Controllers\Api\ListTimeKeepingController;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\RegistrationController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout']);
Route::post('/register', [RegistrationController::class, 'register']);
Route::post('/forgot', [RegistrationController::class, 'forgot']);
Route::post('/reset_password', [RegistrationController::class, 'reset_password']);
// Route::apiresource('/listEmployee', HomeEmployeeController::class);
Route::apiResource('/employee', EmployeeController::class)->except('index', 'store');
//Route::get('/employee', [EmployeeController::class, 'index']);
Route::post('/employee', [EmployeeController::class, 'store']);
// Route::apiResource('/category', CategoryController::class);
Route::get('listEmployee',[ ListEmployeeController::class, 'index']);
Route::get('listRank',[ListEmployeeController::class, 'listRank']);
Route::get('listStatus', [ListEmployeeController::class, 'listStatus']);
Route::apiResource('/demo', demoController::class);

Route::get('timekeeping_list', [ListTimeKeepingController::class, 'index']);
Route::post('timekeeping', [ListTimeKeepingController::class, 'store']);
Route::get('timekeeping', [ListTimeKeepingController::class, 'getTimekeeping']);
Route::get('listYear', [ListTimeKeepingController::class, 'listYear']);
// Route::get('timekeeping', [ListTimeKeepingController::class, 'store']);
// Route::post('/postemployee',[EmployeeController::class, 'store']);
// Route::get('text', function () {
//     return view('welcome');
// });
// Route::get('/users', function () {
//     return UserResource::collection(User::all());
// });
// Route::apiResource('/demo', [demoController::class]);
