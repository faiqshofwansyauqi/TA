<?php


use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\INCController;
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

Route::prefix('antenatal_care')->group(function () {
    Route::get('tm1', [ANCController::class, 'tm1'])->name('antenatal_care.tm1');
    Route::post('store-tm1', [ANCController::class, 'store_tm1'])->name('antenatal_care.store_tm1');
    Route::get('data-tm1', [ANCController::class, 'getData_tm1'])->name('antenatal_care.data_tm1');
    Route::get('antenatal_care/show_tm1/{id}', [ANCController::class, 'show_tm1'])->name('antenatal_care.show_tm1');
    Route::get('antenatal_care/edit_tm1/{id}', [ANCController::class, 'edit_tm1'])->name('antenatal_care.edit_tm1');
    Route::put('antenatal_care/update_tm1/{id}', [ANCController::class, 'update_tm1'])->name('antenatal_care.update_tm1');
    Route::delete('antenatal_care/destroy_tm1/{id}', [ANCController::class, 'destroy_tm1'])->name('antenatal_care.destroy_tm1');
    ///////////// ANC /////////////
    Route::get('anc', [ANCController::class, 'anc'])->name('antenatal_care.anc');
    Route::post('store-anc', [ANCController::class, 'store_anc'])->name('antenatal_care.store_anc');
    Route::get('data-anc', [ANCController::class, 'getData_anc'])->name('antenatal_care.data_anc');
    Route::get('antenatal_care/edit_anc/{id}', [ANCController::class, 'edit_anc'])->name('antenatal_care.edit_anc');
    Route::put('antenatal_care/update_anc/{id}', [ANCController::class, 'update_anc'])->name('antenatal_care.update_anc');
    Route::delete('antenatal_care/destroy_anc/{id}', [ANCController::class, 'destroy_anc'])->name('antenatal_care.destroy_anc');
    ///////////// SHOW ANC /////////////
    Route::post('store-show_anc', [ANCController::class, 'store_showanc'])->name('antenatal_care.store_showanc');
    Route::get('anc/show_anc/{id}', [ANCController::class, 'show_anc'])->name('antenatal_care.show_anc');
    Route::get('data-show_anc/{NIK}', [ANCController::class, 'getData_showanc'])->name('antenatal_care.data_showanc');
    Route::get('show_anc/edit_showanc/{id}', [ANCController::class, 'edit_showanc'])->name('antenatal_care.edit_showanc');
    Route::put('show_ach/update_showanc/{id}', [ANCController::class, 'update_showanc'])->name('antenatal_care.update_showanc');
    ///////////// RENCANA PERSALINAN /////////////
    Route::get('persalinan', [ANCController::class, 'Persalinan'])->name('antenatal_care.persalinan');
    Route::post('store-persalinan', [ANCController::class, 'store_persalinan'])->name('antenatal_care.store_persalinan');
    Route::get('data-persalinan', [ANCController::class, 'getData_persalinan'])->name('antenatal_care.data_persalinan');
    Route::get('antenatal_care/show_persalinan/{id}', [ANCController::class, 'show_persalinan'])->name('antenatal_care.show_persalinan');
    Route::get('antenatal_care/edit_persalinan/{id}', [ANCController::class, 'edit_persalinan'])->name('antenatal_care.edit_persalinan');
    Route::put('antenatal_care/update_persalinan/{id}', [ANCController::class, 'update_persalinan'])->name('antenatal_care.update_persalinan');
    Route::delete('antenatal_care/destroy_persalinan/{id}', [ANCController::class, 'destroy_persalinan'])->name('antenatal_care.destroy_persalinan');
});
Route::prefix('intranatal_care')->group(function () {
    ///////////// RENCANA PERSALINAN /////////////
    Route::get('persalinan', [INCController::class, 'Persalinan'])->name('intranatal_care.persalinan');
    Route::post('store-persalinan', [INCController::class, 'store_persalinan'])->name('intranatal_care.store_persalinan');
    Route::get('data-persalinan', [INCController::class, 'getData_persalinan'])->name('intranatal_care.data_persalinan');
    Route::get('intranatal_care/show_persalinan/{id}', [INCController::class, 'show_persalinan'])->name('intranatal_care.show_persalinan');
    Route::get('intranatal_care/edit_persalinan/{id}', [INCController::class, 'edit_persalinan'])->name('intranatal_care.edit_persalinan');
    Route::put('intranatal_care/update_persalinan/{id}', [INCController::class, 'update_persalinan'])->name('intranatal_care.update_persalinan');
    Route::delete('intranatal_care/destroy_persalinan/{id}', [INCController::class, 'destroy_persalinan'])->name('intranatal_care.destroy_persalinan');
});

Route::prefix('rekam_medis')->group(function () {
    
    ///////////// RO PB /////////////
    Route::get('ropb', [RekamMedisController::class, 'ropb'])->name('rekam_medis.ropb');
    Route::post('store-ropb', [RekamMedisController::class, 'store_ropb'])->name('rekam_medis.store_ropb');
    Route::get('data-ropb', [RekamMedisController::class, 'getData_ropb'])->name('rekam_medis.data_ropb');
    Route::get('rekam_medis/show_ropb/{id}', [RekamMedisController::class, 'show_ropb'])->name('rekam_medis.show_ropb');
    Route::get('rekam_medis/edit_ropb/{id}', [RekamMedisController::class, 'edit_ropb'])->name('rekam_medis.edit_ropb');
    Route::put('rekam_medis/update_ropb/{id}', [RekamMedisController::class, 'update_ropb'])->name('rekam_medis.update_ropb');
    Route::delete('rekam_medis/destroy_ropb/{id}', [RekamMedisController::class, 'destroy_ropb'])->name('rekam_medis.destroy_ropb');
});


Route::prefix('master')->group(function () {
    Route::get('pasien', [MasterController::class, 'pasien'])->name('master.pasien');
});
