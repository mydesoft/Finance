<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Transfer;
use Carbon\Carbon;


class UserPagesController extends Controller
{
   
   public function user_dashboard(){
 
       return view('user.user_dashboard');
   }
   
    public function logout(){
        Auth::logout();
        return redirect('/login');
    }

    public function UpdatePassword(Request $request){

        $request->validate([
            // 'old_password' => 'required',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required'

        ]);


// 
        // if(((request()->old_password)) == ((auth()->user()->password))){

            auth()->user()->fill(['password' => Hash::make($request->password_confirmation)])->save();
            return redirect('/user_dashboard')->with('success', 'Password Updated Successfully');

        
        // else{
        //     return redirect('/user_dashboard')->with('error', 'Old Password Must be Correct');
        // }

    }

    public function UpdateProfile(User $user){
      $updateprofile =  request()->validate([
            'name' => 'required',
            'gender' => 'required',
            'email' => 'required',
             'state' => 'required'

        ]);
       auth()->user()->update($updateprofile);
        return redirect('/user_dashboard')->with('success', 'Profile Updated Successfully');
    }


    Public function UploadProfileImage(User $user){
        request()->validate([
            'profile_picture' => 'required'
        ]);

        if(request()->hasFile('profile_picture')){
            //GET FILENAME WITH EXTENSION
            $FileNameWithExtension = request()->file('profile_picture')->getClientOriginalName();
            //Get Just File Name
            $FileName = pathinfo($FileNameWithExtension, PATHINFO_FILENAME);
            //Get Just File Extension
            $Extension = request()->file('profile_picture')->getClientOriginalExtension();
            //Filename to Store
            $FileNameToStore = $FileName.'_'.time().'.'.$Extension;
            //Upload File
            $path = request()->file('profile_picture')->storeAs('public/profile_picture', $FileNameToStore);
        }
        else{
            $FileNameToStore = 'noimage.jpg';
        }
        $user = auth()->user();
           
            $user->profile_picture = $FileNameToStore;
            // $user->profile_picture = request()->profile_picture;
            $user->save();
        
        

        return redirect('/user_dashboard')->with('success', 'Profile Image Updated Successfully');

       
    }

    public function DeleteProfileImage($id){
        $user = auth()->user();

        $user =User::find ($id);
        // $user->profile_picture = $FileNameToStore;
        if($user->profile_picture !== 'noimage.jpg'){
            Storage:: delete('public/profile_picture', $user->profile_picture);
        }
        return redirect('/user_dashboard')->with('success', 'Profile Image Deleted Successfully');
    }


    public function OnlineTransfer(){
        $transfers = Transfer::all();
        return view('user.online_transfer');
    }

    public function Transfer(Request $request, User $user){
        
        $request->validate([
            
            'recipient_account_name' => 'required',
            'recipient_account_number' => 'required',
            'recipient_bank' => 'required',
            'amount' => 'required',
            'transfer_code' => 'required',
        ],[
            'amount.required' => 'Please enter amount'
        ]);

        $user = auth()->user();

        // dd($request->transfer_code);
        
        if(!((Auth::user()->transfer_code) == ($request->transfer_code))){
            return redirect('/online_transfer')->with('error', 'Invalid Transfer Pin!');
        }else{
            if($user->balance > $request->amount){
                $user->balance -= $request->amount;

                auth()->user()->withdrawal += $request->amount;

                $user = auth()->user();
                $user->balance = auth()->user()->balance;
                $user->withdrawal = auth()->user()->withdrawal;
                $user->save();  

                $transfer = new Transfer;
                $transfer->user_id = auth()->user()->id;
                $transfer->recipient_account_name = $request->recipient_account_name;
                $transfer->recipient_account_number = $request->recipient_account_number;
                $transfer->recipient_bank = $request->recipient_bank;
                $transfer->amount = $request->amount;
                $transfer->save();
            }
            else{
                return redirect('/online_transfer')->with('error', ' Insuffcient Fund!');
            }
        }

        
        
        
        
        return redirect('/online_transfer')->with('success', 'Transfer Successful!');

    }

     

    public function AccountHistory(){
        $transfers = Transfer::all();
        return view('user.account_history', compact('transfers'));
    }
    
}
