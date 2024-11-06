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
Route::post('/test/{ram}', [AuthController::class, 'test']);

Route::post('/', function () {
    echo 'testsadss';
});
