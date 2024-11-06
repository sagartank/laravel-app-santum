<?php
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;

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
// http://127.0.0.1:8000/api/

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware(['auth:sanctum'])->group(function () {
	Route::get('/user',function(Request $request){
		return $request->user();
	});
	
	Route::get('/logout', [AuthController::class, 'logout']);
});

Route::get('/add', [AuthController::class, 'add']);
Route::get('/update', [AuthController::class, 'update']);
Route::get('/get-all-user', [AuthController::class, 'getAllUser']);
Route::get('/user-info/{id}', [AuthController::class, 'userInfo']);
							// ->middleware(['auth:sanctum']);

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/', function () {
    echo 'testsadss';
});
