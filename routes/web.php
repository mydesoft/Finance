<?php

use Illuminate\Support\Facades\Route;

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

//  GUEST PAGE

Route::get('/', 'GuestPagesController@index');
Route::get('/register', 'GuestPagesController@register');
Route::post('/register', 'GuestPagesController@Register_User');
Route::get('/login', 'GuestPagesController@login')->name('login');
Route::post('/login_dashboard', 'GuestPagesController@Login_User');


Route::group(['middleware' => ['auth']], function () {
    Route::group(['middleware' => ['user']], function () {
        Route::get('/user_dashboard', 'UserPagesController@user_dashboard');
        Route::post('/logout', 'UserPagesController@logout');
        Route::patch('/profile/{profile}', 'UserPagesController@UpdateProfile');
        Route::patch('/update_password/{password}', 'UserPagesController@UpdatePassword');
        Route::post('/upload_image/{profile}', 'UserPagesController@UploadProfileImage');
        Route::delete('/delete_ProfileImage/{profile}', 'UserPagesController@DeleteProfileImage');
        Route::get('/online_transfer', 'UserPagesController@OnlineTransfer');
        Route::post('/transfer/{transfer}', 'UserPagesController@Transfer');
        Route::get('/account_history', 'UserPagesController@AccountHistory');
        
    });  
  

    Route::group(['middleware' => ['admin']], function () {
        
         Route::get('/admin_dashboard', 'AdminPagesController@admin_dashboard')->name('admin_dashboard');
         Route::post('/signout', 'AdminPagesController@signout');
         Route::post('/upload_admin_image/{profile}', 'AdminPagesController@AdminImage');
         Route::get('/all_users', 'AdminPagesController@AllUsers');
         Route::get('/admin/user/{edit}/edit', 'AdminPagesController@EditUsers');
         Route::patch('/admin/user/edit/{edit}', 'AdminPagesController@UpdateUsers');
         Route::get('/admin/user/delete/{delete}', 'AdminPagesController@DeleteUsers');
         Route::get('/admin/user/{transaction}/transaction', 'AdminPagesController@UserTransaction');
         Route::get('/all_admin', 'AdminPagesController@AllAdmin');
         Route::post('/createadmin', 'AdminPagesController@CreateAdmin');
         Route::get('/admin/admin/delete/{delete}', 'AdminPagesController@DeleteAdmin');
         
    
    });


});







