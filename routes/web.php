<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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
      dd('test');
//     return view('welcome');
});

Route::get('/jobs', function () {

		/*dispatch(function(){
			$delay = now()->addSeconds(3);
         	 \Mail::to('sagar.t@softnweb.in')
            ->send(new \App\Mail\SendMarkdownMAil());
	  		// $result = event(new \App\Events\Profilecheck($user));
		});*/
            // addMinutes
	  dispatch(new \App\Jobs\SendTestMailJob())->delay(now()->addSeconds(5));
      echo "mail sent";
      exit;
      // OR 
      // App\Events\profilecheck::dispatch($user)
  
});


Route::get('/', function () {
      $user =  \App\Models\User::where('id', 1)->first();
      dd('ram');
});


Route::get('/testme', [AuthController::class, 'yes']);