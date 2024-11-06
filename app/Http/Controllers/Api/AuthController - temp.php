<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{

    public function register(Request $request)
    {
        $attr = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required|string|min:6'
        ]);

        $user = User::create([
            'name' => $request->get('name'),
            'password' => bcrypt($request->get('password')),
            'email' =>$request->get('email')
        ]);

        return response()->json(['status' => 'success', 'token' =>  $user->createToken('tokens')->plainTextToken]);
    }
    
    public function login(Request $request)
    {
        $data = array();
        $attr = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string'
        ]);

        if (!\Auth::attempt($attr)) {
            return response()->json(['status' => 'error', 'message' =>  'Credentials not match'], 401);
        }

        $token = auth()->user()->createToken('API Token')->plainTextToken;
        if(isset($token)) {
            $data = auth()->user();
        }
        return response()->json(['status' => 'success', 'message' => 'login successfully.', 'token' =>  $token,'data' => $data]);
    }

    // this method signs out users by removing tokens
    public function logout(Request $request)
    {
        \auth()->user()->tokens()->delete();
        return response()->json(['status' => 'success', 'message' => 'logout successfully.']);
    }


    public function getAllUser(){
      $result = User::get()->toArray();
      return response()->json(['status' => 'success', 'message' => 'successfully.',
        'data' => $result]);
  }
  
  public function userInfo($id){
      $user = User::where('id', $id)->first();
     /* 
        working mail
        $to_name = 'sagar';
        $to_email = 'sagar.t@softnweb.in';
        $data = array('name'=>'Ogbonna Vitalis(sender_name)', 'body' => 'A test mail');
        $result =  \Mail::send('emails.profile_checked', $data, function($message) use ($to_name, $to_email) {
        $message->to($to_email, $to_name)->subject('Laravel Test Mail');
        $message->from('sagar.t@softnweb.in','Test Mail');
        });
      */
   
      $result = event(new \App\Events\Profilecheck($user));
      echo "test event";
      exit;
      // OR 
      // App\Events\profilecheck::dispatch($user)

      
      return response()->json(['status' => 'success', 'message' => 'successfully.',
        'data' => $result]);
  }


  public function add(Request $request){
    $user = new User();
    $user->name = 'kano'.time();
    $user->password =  bcrypt('123456');
    $user->email = 'kano'.rand(1,100).'@gmail.com';
    $user->save();
    echo "save";
    }

    public function update(){
      $user = User::where('id','8')->first();
      $user->name = 'kano'.time();
      $user->password =  bcrypt('123456');
      $user->email = 'kano'.rand(1,100).'@gmail.com';
      $user->save();
      echo "update";
    }
}
