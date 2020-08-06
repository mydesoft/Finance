<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;
use App\User;
use App\Transfer;
use App\Role;


class AdminPagesController extends Controller
{
    public function admin_dashboard(){
       
        return view('admin.admin_dashboard');
    }

    public function signout(){
        Auth::logout();
        return redirect('/login');
    }

    public function AdminImage( User $user){
        request()->validate([
            'profile_picture' => 'required',
        ],
        [
            'profile_picture.required' => 'Please Select Your Profile Picture!',
        ]
        );

        if(request()->hasFile('profile_picture')){
            $FileNameWithExt = request()->file('profile_picture')->getClientOriginalName();
            $FileName = pathinfo($FileNameWithExt, PATHINFO_FILENAME);
            $Ext = request()->file('profile_picture')->getClientOriginalExtension();
            $store =  $FileName.'_'.time().'.'.$Ext;
            $path1 = request()->file('profile_picture')->storeAs('public/profile_picture', $store);
        }
        else{
            $store = 'noimage.jpg';
        }

        $user = auth()->user();
        $user->profile_picture = $store;
        $user->save();

        return redirect('/admin_dashboard')->with('success', 'Profile Image Updated Successfully');
    }

    public function AllUsers(){
        $users = User::all();
         return view('admin.all_users', compact('users'));
        
    }

    public function EditUsers($id){
        $user = User::find($id);
        return view('admin.admin_users_edit', compact('user'));
    }

    public function UpdateUsers($id){
        $user = User::find($id);

        $updateuser = request()->validate([
            'name' => 'required',
            'gender' => 'required',
            'email' => 'required',
            'balance' => 'required',
             'state' => 'required'
         ],
         [
             'name.required' => 'Please Enter Your Name!',
             'gender.required' => 'Please Enter Your Gender!',
             'email.required' => 'Please Enter Your Email!',
             'balance.required' => 'Please Enter the Balance',
            
             'state.required' => 'Please Enter Your State!'
         ]
    );
        $user->update($updateuser);
        return redirect('/all_users')->with('success', 'User Account Updated Successfully');
    }


    public function DeleteUsers($id){
        $user = User::find($id);
        $user->delete();
        return redirect('/all_users')->with('success', 'User Deleted Successfully');
    }

    public function UserTransaction($id){
        $user = User::find($id);
        $transfers = Transfer::all();
        return view('admin.transaction', compact('transfers', 'user'));
    }

    public function CreateAdmin(Request $request){
        $request->validate([
            'name'=> 'required',
            'email'=> 'required',
            'password' => 'required|confirmed'
        ],
        [
            'name.required' => 'Name is required',
            'email.required'=> 'Email is required',
            'password.required' => 'password is required'
        ]
    );
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        $user->save();
        $role = Role::where('name','admin')->firstOrFail();
        $user->roles()->attach($role->id);

        return redirect('/admin_dashboard')->with('success', 'Admin Created Successfully');
        

    }

    public function AllAdmin(){
        $users = User::all();
        return view('admin.all_admin', compact('users'));
    }

    
    public function DeleteAdmin($id){
        $user = User::find($id);
        $user->delete();
        return redirect('/admin_dashboard')->with('success', 'Admin Deleted Successfully');
    }
}
