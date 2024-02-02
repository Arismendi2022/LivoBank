<?php

  use Illuminate\Support\Facades\Route;
  use App\Http\Controllers\AdminController;

  /*
  |--------------------------------------------------------------------------
  | Web Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register web routes for your application. These
  | routes are loaded by the RouteServiceProvider and all of them will
  | be assigned to the "web" middleware group. Make something great!
  |
  */

  Route::get('/',function(){
    return view('backend.pages.admin.auth.login');
  });

  Route::prefix('admin')->name('admin.')->group(function(){

    Route::middleware(['guest:admin','PreventBackHistory'])->group(function(){
      Route::view('/login','backend.pages.admin.auth.login')->name('login');
      Route::post('/login_handler', [AdminController::class,'loginHandler'])->name('login_handler');
      Route::view('/forgot-password','backend.pages.admin.auth.forgot-password')->name('forgot-password');
      Route::post('/send-password-reset-link',[AdminController::class,'sendPasswordResetLink'])->name('send-password-reset-link');
      Route::get('/password/reset/{token}',[AdminController::class,'resetPassword'])->name('reset-password');
      Route::post('/reset-password-handler',[AdminController::class,'resetPasswordHandler'])->name('reset-password-handler');

    });

    Route::middleware(['auth:admin','PreventBackHistory'])->group(function(){
      Route::view('/home','backend.pages.admin.home')->name('home');
      Route::post('/logout_handler', [Admincontroller::class,'logoutHandler'])->name('logout_handler');
      Route::get('/profile', [Admincontroller::class,'profileView'])->name('profile');

    });


  });


