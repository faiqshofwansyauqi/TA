<?php

use App\Http\Controllers\AntenatelController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\PasienController;
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

Route::get('/', [LandingController::class, 'landing'])->name('home');

Route::middleware(['auth'])->group(function(){
    
    Route::get('/logout',[AuthController::class,'logout'])->name('logout');
    Route::get('/dashboard',[HomeController::class,'index'])->name('home');
});



Route::middleware(['guest'])->group(function(){
    Route::get('login',[AuthController::class,'index'])->name('login');
    Route::post('login',[AuthController::class,'login'])->name('login.store');
    Route::get('register', [AuthController::class, 'showRegistrationForm'])->name('register');
    Route::post('register', [AuthController::class, 'register'])->name('register.store');
});

Route::prefix('pasien')->group(function(){
    Route::get('ibu',[PasienController::class,'ibu'])->name('pasien.ibu');
    Route::get('anak',[PasienController::class,'anak'])->name('pasien.anak');
});

Route::prefix('antenatel')->group(function(){
    Route::get('antenatel',[AntenatelController::class,'antenatel'])->name('antenatel.antenatel');
});
