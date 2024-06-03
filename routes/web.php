<?php


use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\MasterController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\RekamMedisController;
use App\Http\Controllers\ANCController;
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
Route::get('pendaftaran', [LandingController::class, 'pendaftaran']);

Route::middleware(['auth'])->group(function () {

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
});



Route::middleware(['guest'])->group(function () {
    Route::get('login', [AuthController::class, 'index'])->name('login');
    Route::post('login', [AuthController::class, 'login'])->name('login.store');
    Route::get('register', [AuthController::class, 'showRegistrationForm'])->name('register');
    Route::post('register', [AuthController::class, 'register'])->name('register.store');
});

Route::get('error', [HomeController::class, 'ERROR'])->name('errors.404');

Route::prefix('pasien')->group(function () {
    Route::get('ibu', [PasienController::class, 'Ibu'])->name('pasien.ibu');
    Route::get('anak', [PasienController::class, 'Anak'])->name('pasien.anak');
    Route::post('store-anak', [PasienController::class, 'store_anak'])->name('pasien.store_anak');
    Route::post('store-ibu', [PasienController::class, 'store_ibu'])->name('pasien.store_ibu');
    Route::get('data-anak', [PasienController::class, 'getData_anak'])->name('pasien.data_anak');
    Route::get('data-ibu', [PasienController::class, 'getData_ibu'])->name('pasien.data_ibu');
    Route::get('pasien/edit_anak/{id}', [PasienController::class, 'edit_anak'])->name('pasien.edit_anak');
    Route::put('pasien/update_anak/{id}', [PasienController::class, 'update_anak'])->name('pasien.update_anak');
    Route::delete('pasien/destroy_anak/{id}', [PasienController::class, 'destroy_anak'])->name('pasien.destroy_anak');
    Route::get('pasien/edit_ibu/{id}', [PasienController::class, 'edit_ibu'])->name('pasien.edit_ibu');
    Route::put('pasien/update_ibu/{id}', [PasienController::class, 'update_ibu'])->name('pasien.update_ibu');
    Route::delete('pasien/destroy_ibu/{id}', [PasienController::class, 'destroy_ibu'])->name('pasien.destroy_ibu');
});
Route::prefix('anc')->group(function () {
    Route::get('pemeriksaan_dokter_tm1', [ANCController::class, 'tm1'])->name('anc.tm1');
    Route::post('store-tm1', [ANCController::class, 'store_tm1'])->name('anc.store_tm1');
    Route::get('data-tm1', [ANCController::class, 'getData_tm1'])->name('anc.data_tm1');
    Route::get('anc/show_tm1/{id}', [ANCController::class, 'show_tm1'])->name('anc.show_tm1');
    Route::get('anc/edit_tm1/{id}', [ANCController::class, 'edit_tm1'])->name('anc.edit_tm1');
    Route::put('anc/update_tm1/{id}', [ANCController::class, 'update_tm1'])->name('anc.update_tm1');
    Route::delete('anc/destroy_tm1/{id}', [ANCController::class, 'destroy_tm1'])->name('anc.destroy_tm1');
});

Route::prefix('rekam_medis')->group(function () {
    Route::get('persalinan', [RekamMedisController::class, 'Persalinan'])->name('rekam_medis.persalinan');
    Route::post('store-persalinan', [RekamMedisController::class, 'store_persalinan'])->name('rekam_medis.store_persalinan');
    Route::get('data-persalinan', [RekamMedisController::class, 'getData_persalinan'])->name('rekam_medis.data_persalinan');
    Route::get('rekam_medis/show_persalinan/{id}', [RekamMedisController::class, 'show_persalinan'])->name('rekam_medis.show_persalinan');
    Route::get('rekam_medis/edit_persalinan/{id}', [RekamMedisController::class, 'edit_persalinan'])->name('rekam_medis.edit_persalinan');
    Route::put('rekam_medis/update_persalinan/{id}', [RekamMedisController::class, 'update_persalinan'])->name('rekam_medis.update_persalinan');
    Route::delete('rekam_medis/destroy_persalinan/{id}', [RekamMedisController::class, 'destroy_persalinan'])->name('rekam_medis.destroy_persalinan');
    ///////////// RO PB /////////////
    Route::get('ropb', [RekamMedisController::class, 'ropb'])->name('rekam_medis.ropb');
    Route::post('store-ropb', [RekamMedisController::class, 'store_ropb'])->name('rekam_medis.store_ropb');
    Route::get('data-ropb', [RekamMedisController::class, 'getData_ropb'])->name('rekam_medis.data_ropb');
    Route::get('rekam_medis/show_ropb/{id}', [RekamMedisController::class, 'show_ropb'])->name('rekam_medis.show_ropb');
    Route::get('rekam_medis/edit_ropb/{id}', [RekamMedisController::class, 'edit_ropb'])->name('rekam_medis.edit_ropb');
    Route::put('rekam_medis/update_ropb/{id}', [RekamMedisController::class, 'update_ropb'])->name('rekam_medis.update_ropb'); 
    Route::delete('rekam_medis/destroy_ropb/{id}', [RekamMedisController::class, 'destroy_ropb'])->name('rekam_medis.destroy_ropb');
    ///////////// ANC /////////////
    Route::get('anc', [RekamMedisController::class, 'anc'])->name('rekam_medis.anc');
    Route::post('store-anc', [RekamMedisController::class, 'store_anc'])->name('rekam_medis.store_anc');
    Route::get('data-anc', [RekamMedisController::class, 'getData_anc'])->name('rekam_medis.data_anc');
    Route::get('rekam_medis/edit_anc/{id}', [RekamMedisController::class, 'edit_anc'])->name('rekam_medis.edit_anc');
    Route::put('rekam_medis/update_anc/{id}', [RekamMedisController::class, 'update_anc'])->name('rekam_medis.update_anc');
    Route::delete('rekam_medis/destroy_anc/{id}', [RekamMedisController::class, 'destroy_anc'])->name('rekam_medis.destroy_anc');
    ///////////// SHOW ANC /////////////
    Route::post('store-show_anc', [RekamMedisController::class, 'store_showanc'])->name('rekam_medis.store_showanc');
    Route::get('anc/show_anc/{id}', [RekamMedisController::class, 'show_anc'])->name('rekam_medis.show_anc');
    Route::get('data-show_anc/{NIK}', [RekamMedisController::class, 'getData_showanc'])->name('rekam_medis.data_showanc');
    Route::get('show_anc/edit_showanc/{id}', [RekamMedisController::class, 'edit_showanc'])->name('rekam_medis.edit_showanc');
    Route::put('show_ach/update_showanc/{id}', [RekamMedisController::class, 'update_showanc'])->name('rekam_medis.update_showanc');
    
});


Route::prefix('master')->group(function () {
    Route::get('pasien', [MasterController::class, 'pasien'])->name('master.pasien');
});
