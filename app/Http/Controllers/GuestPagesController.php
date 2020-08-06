<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Role;


class GuestPagesController extends Controller
{
    public function index(){
        return view('guest.index');
    }


    public function login(){
        return view('guest.login');
    }


    public function register(){
        return view('guest.register');
    }

    public function Register_User( Request $request){
             $request->validate([
                'name' => 'required',
                'gender' => 'required',
                'email' => 'required',
                'password' => 'confirmed',
                'password_confirmation' => 'required',
                'account_type' => 'required',
                 'state' => 'required'
             ],
             [
                 'name.required' => 'Please Enter Your Name!',
                 'gender.required' => 'Please Enter Your Gender!',
                 'email.required' => 'Please Enter Your Email!',
                 'password.required' => 'Please Enter Your Password!',
                 'password.confirmed' => 'The Passwords Entered Does Not Match!',
                 'password_confirmation.required' => 'Please Confirm Your Password!',
                 'account_type.required' => 'Please Enter Your Account Type!',
                 'state.required' => 'Please Enter Your State!'
             ]
        );
            
           
           $user = new User;
           $user->name = $request->name;
           $user->gender = $request->gender;
           $user->email = $request->email;
           $user->password = Hash::make($request->password);
           $user->account_type = $request->account_type;
           $user->state = $request->state;
           $user->account_number = rand(3010000005, 3019999999);
           $user->transfer_code = rand(1459, 9459);
           
          
            

            $user->save();
            $role = Role::where('name','user')->firstOrFail();
            $user->roles()->attach($role->id);
            return redirect('/login');


            
    }


public function Login_User(Request $request){
    $login_attributes = $request->validate([
        'email' => 'required',
        'password' => 'required'
    ]);
    

    if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
        // dd($login_attributes);
        // return 'Details Does not Match';
        return redirect('/user_dashboard');
    }
    else{
        // return 'error';
        // request()->session()->flash();
        return redirect('/login')->with('error', 'Login Details Does Not Match!');
    }
}



}