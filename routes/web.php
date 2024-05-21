<?php


use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\MasterController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\RekamMedisController;
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
    Route::get('anak', [PasienController::class, 'showAnakPage'])->name('pasien.anak');
});

Route::prefix('rekam_medis')->group(function () {
    Route::get('persalinan', [RekamMedisController::class, 'Persalinan'])->name('rekam_medis.persalinan');
    Route::post('store-persalinan', [RekamMedisController::class, 'store_persalinan'])->name('rekam_medis.store_persalinan');
    Route::get('data-persalinan', [RekamMedisController::class, 'getData_persalinan'])->name('rekam_medis.data_persalinan');
    Route::get('/rekam_medis/{id}/show', [RekamMedisController::class, 'show_persalinan'])->name('rekam_medis.show_persalinan');
    Route::get('/rekam_medis/{id}/edit', [RekamMedisController::class, 'edit_persalinan'])->name('rekam_medis.edit_persalinan');
    Route::put('rekam_medis/update_persalinan/{id}', [RekamMedisController::class, 'update_persalinan'])->name('rekam_medis.update_persalinan');
    Route::delete('/rekam_medis/{id}', [RekamMedisController::class, 'destroy_persalinan'])->name('rekam_medis.destroy_persalinan');
    Route::get('persalinan', [RekamMedisController::class, 'showIbuPage'])->name('rekam_medis.persalinan');
    Route::get('pnc', [RekamMedisController::class, 'pnc'])->name('rekam_medis.pnc');
    Route::post('store-pnc', [RekamMedisController::class, 'store_pnc'])->name('rekam_medis.store_pnc');
    Route::get('pnc', [RekamMedisController::class, 'showIbuPage_pnc'])->name('rekam_medis.pnc');
    Route::get('data-pnc', [RekamMedisController::class, 'getData_pnc'])->name('rekam_medis.data_pnc');
    Route::get('detail_pnc', [RekamMedisController::class, 'detail_pnc'])->name('rekam_medis.detail_pnc');
});


Route::prefix('master')->group(function () {
    Route::get('pasien', [MasterController::class, 'pasien'])->name('master.pasien');
});
