<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Pages\BlacklistController;
use App\Http\Controllers\Auth\ForgotPasswordController;

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
    return view('welcome');
});

Route::get('/home', [HomeController::class, 'index']);
Route::get('search-agent',[HomeController::class, 'searchAgent'])->name('agent.search');
Route::get('search-member',[HomeController::class, 'searchMember'])->name('member.search');
Route::get('search-blacklist',[HomeController::class, 'searchBlacklist'])->name('blacklist.search');

//Route for authenticating users' login and registration
Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post'); 
// Route::get('registration', [AuthController::class, 'registration'])->name('register');
Route::get('userRegistration', [AuthController::class, 'userRegistration'])->name('user.register');
Route::get('agent-registration', [AuthController::class, 'agentRegistration'])->name('agent.register');
Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post'); 
Route::get('delete-agent/{id}',[AuthController::class, 'deleteAgent'])->name('agent.delete');
Route::get('delete-member/{id}',[AuthController::class, 'deleteMember'])->name('member.delete');

//Route for editing and updating users' information
Route::get('agent-edit/{id}', [AuthController::class, 'editAgent'])->name('agent.edit');
Route::get('member-edit/{id}', [AuthController::class, 'editMember'])->name('member.edit');
Route::post('update' ,[AuthController::class,'update'])->name('user.update');
Route::get('show-member',[AuthController::class, 'showMember'])->name('member.show');

//Route for user only can view others
Route::get('view-agent',[AuthController::class, 'viewAgent'])->name('agent.view');
Route::get('view-member',[AuthController::class, 'viewMember'],[AuthController::class,''])->name('member.view');

//Route for handling matter of blacklisting
Route::get('add-to-blacklist/{id}',[BlacklistController::class, 'addToBlacklist'])->name('add.to.blacklist');
Route::post('post-blacklist',[BlacklistController::class, 'add'])->name('blacklist.post');
Route::get('delete-blacklisted-person/{id}',[BlacklistController::class, 'delete'])->name('blacklist.delete');

// Profile
Route::get('profile', [AuthController::class, 'profile'])->name('profile.view'); 
Route::get('editProfile', [AuthController::class, 'editProfile'])->name('profile.edit');
Route::post('update-profile',[AuthController::class, 'updateProfile'])->name('profile.update');
Route::get('logout', [AuthController::class, 'logout'])->name('user.logout');

// Change Password
Route::get('change-password', [AuthController::class, 'editPassword'])->name('password.change');
Route::post('update-password',[AuthController::class, 'updatePassword'])->name('passwordUpdate');


Route::get('dashboard',[AuthController::class,'showAgent'])->name('dashboard');

//Route for providing support if user forget password
Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [ForgotPasswordController::class, 'sendForgetPasswordForm'])->name('forget.password.post'); 
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'sendResetPasswordForm'])->name('reset.password.post');


Auth::routes();

Route::get('home', [HomeController::class, 'index'])->name('home');
