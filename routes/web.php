<?php


use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\INCController;
use App\Http\Controllers\KMSContronller;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\PNCController;
use App\Http\Controllers\ANCController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\KBController;
use App\Http\Controllers\NotificationController;
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
    Route::get('/profile/{id}', [HomeController::class, 'profile'])->name('dashboard.profile');
    Route::put('/profile/update/{id}', [HomeController::class, 'profile_update'])->name('dashboard.profile_update');
    Route::put('/profile/{user}', [HomeController::class, 'update_profile'])->name('dashboard.update_profile');
    Route::delete('/profile/{user}', [HomeController::class, 'delete_profile'])->name('dashboard.delete_profile');
    Route::get('error', [HomeController::class, 'ERROR'])->name('errors.404');

    Route::prefix('pasien')->group(function () {
        Route::get('ibu', [PasienController::class, 'Ibu'])->name('pasien.ibu');
        Route::get('anak', [PasienController::class, 'Anak'])->name('pasien.anak');
        Route::post('store-anak', [PasienController::class, 'store_anak'])->name('pasien.store_anak');
        Route::post('store-ibu', [PasienController::class, 'store_ibu'])->name('pasien.store_ibu');
        Route::get('data-anak', [PasienController::class, 'getData_anak'])->name('pasien.data_anak');
        Route::get('data-ibu', [PasienController::class, 'getData_ibu'])->name('pasien.data_ibu');
        Route::delete('pasien/ibu/{id}', [PasienController::class, 'delete_ibu'])->name('pasien.delete_ibu');
        Route::get('pasien/anak/{nama_ibu}', [PasienController::class, 'getInfo_ibu'])->name('pasien.info_ibu');
        Route::get('pasien/edit_anak/{id}', [PasienController::class, 'edit_anak'])->name('pasien.edit_anak');
        Route::put('pasien/update_anak/{id}', [PasienController::class, 'update_anak'])->name('pasien.update_anak');
        Route::delete('pasien/destroy_anak/{id}', [PasienController::class, 'destroy_anak'])->name('pasien.destroy_anak');
        Route::get('pasien/edit_ibu/{id}', [PasienController::class, 'edit_ibu'])->name('pasien.edit_ibu');
        Route::put('pasien/update_ibu/{id}', [PasienController::class, 'update_ibu'])->name('pasien.update_ibu');
    });
    Route::prefix('antenatal_care')->group(function () {    
        /////////// ANC /////////////
        Route::get('anc', [ANCController::class, 'anc'])->name('antenatal_care.anc');
        Route::post('store-anc', [ANCController::class, 'store_anc'])->name('antenatal_care.store_anc');
        Route::get('data-anc', [ANCController::class, 'getData_anc'])->name('antenatal_care.data_anc');
        ///////////// SHOW ANC /////////////
        Route::post('store-show_anc', [ANCController::class, 'store_showanc'])->name('antenatal_care.store_showanc');
        Route::get('anc/show_anc/{id}', [ANCController::class, 'show_anc'])->name('antenatal_care.show_anc');
        Route::get('data-show_anc/{id_ibu}', [ANCController::class, 'getData_showanc'])->name('antenatal_care.data_showanc');
        Route::get('show_anc/edit_showanc/{id}', [ANCController::class, 'edit_showanc'])->name('antenatal_care.edit_showanc');
        Route::put('show_anc/update_showanc/{id}', [ANCController::class, 'update_showanc'])->name('antenatal_care.update_showanc');
        ///////////// PEMERIKSAAN BIDAN SAAT K1 /////////////
        Route::get('ropb', [ANCController::class, 'ropb'])->name('antenatal_care.ropb');
        Route::post('store-ropb', [ANCController::class, 'store_ropb'])->name('antenatal_care.store_ropb');
        Route::get('data-ropb', [ANCController::class, 'getData_ropb'])->name('antenatal_care.data_ropb');
        Route::get('antenatal_care/show_ropb/{id}', [ANCController::class, 'show_ropb'])->name('antenatal_care.show_ropb');
        Route::get('antenatal_care/edit_ropb/{id}', [ANCController::class, 'edit_ropb'])->name('antenatal_care.edit_ropb');
        Route::put('antenatal_care/update_ropb/{id}', [ANCController::class, 'update_ropb'])->name('antenatal_care.update_ropb');
        ///////////// RENCANA PERSALINAN /////////////
        Route::get('rnca', [ANCController::class, 'rnca'])->name('antenatal_care.rnca_persalinan');
        Route::post('store-rnca', [ANCController::class, 'store_rnca'])->name('antenatal_care.store_rnca');
        Route::get('data-rnca', [ANCController::class, 'getData_rnca'])->name('antenatal_care.data_rnca');
        Route::get('antenatal_care/rnca/{nama_ibu}', [ANCController::class, 'getInfo_Ropb'])->name('antenatal_care.info_ropb');
        Route::get('antenatal_care/show_rnca/{id}', [ANCController::class, 'show_rnca'])->name('antenatal_care.show_rnca');
        Route::get('antenatal_care/edit_rnca/{id}', [ANCController::class, 'edit_rnca'])->name('antenatal_care.edit_rnca');
        Route::put('antenatal_care/update_rnca/{id}', [ANCController::class, 'update_rnca'])->name('antenatal_care.update_rnca');
    });
    Route::prefix('intranatal_care')->group(function () {
        ///////////// MASA PERSALINAN /////////////
        Route::get('persalinan', [INCController::class, 'Persalinan'])->name('intranatal_care.persalinan');
        Route::post('store-persalinan', [INCController::class, 'store_persalinan'])->name('intranatal_care.store_persalinan');
        Route::get('data-persalinan', [INCController::class, 'getData_persalinan'])->name('intranatal_care.data_persalinan');
        Route::get('intranatal_care/ropb/{nama_ibu}', [INCController::class, 'getInfo_Rnca_persalinan'])->name('intranatal_care.info_rnca_persalinan');
        Route::get('intranatal_care/show_persalinan/{id}', [INCController::class, 'show_persalinan'])->name('intranatal_care.show_persalinan');
        Route::get('intranatal_care/edit_persalinan/{id}', [INCController::class, 'edit_persalinan'])->name('intranatal_care.edit_persalinan');
        Route::put('intranatal_care/update_persalinan/{id}', [INCController::class, 'update_persalinan'])->name('intranatal_care.update_persalinan');
    });
    Route::prefix('postnatal_care')->group(function () {
        ///////////// MASA NIFAS /////////////
        Route::get('nifas', [PNCController::class, 'nifas'])->name('postnatal_care.nifas');
        Route::post('store-nifas', [PNCController::class, 'store_nifas'])->name('postnatal_care.store_nifas');
        Route::get('data-nifas', [PNCController::class, 'getData_nifas'])->name('postnatal_care.data_nifas');
        ///////////// SHOW NIFAS /////////////
        Route::post('store-show_nifas', [PNCController::class, 'store_shownifas'])->name('postnatal_care.store_shownifas');
        Route::get('nifas/show_nifas/{id}', [PNCController::class, 'show_nifas'])->name('postnatal_care.show_nifas');
        Route::get('data-show_nifas/{id_ibu}', [PNCController::class, 'getData_shownifas'])->name('postnatal_care.data_shownifas');
        Route::get('show_nifas/edit_shownifas/{id}', [PNCController::class, 'edit_shownifas'])->name('postnatal_care.edit_shownifas');
        Route::put('show_nifas/update_shownifas/{id}', [PNCController::class, 'update_shownifas'])->name('postnatal_care.update_shownifas');
    });
    Route::prefix('setting')->group(function () {
        Route::get('admin', [SettingController::class, 'admin'])->name('setting.admin');
        Route::get('bidan', [SettingController::class, 'bidan'])->name('setting.bidan');
        Route::get('ibi_puskesmas', [SettingController::class, 'ibi_puskesmas'])->name('setting.ibi_puskesmas');
        Route::get('data-admin', [SettingController::class, 'getData_admin'])->name('setting.data_admin');
        Route::get('data-bidan', [SettingController::class, 'getData_bidan'])->name('setting.data_bidan');
        Route::get('data-ibi_puskesmas', [SettingController::class, 'getData_ibi_puskesmas'])->name('setting.data_ibi_puskesmas');
        Route::post('store-user', [SettingController::class, 'store_user'])->name('setting.store_user');
        Route::get('setting/edit_user/{id}', [SettingController::class, 'edit_user'])->name('setting.edit_user');
        Route::put('setting/update_user/{id}', [SettingController::class, 'update_user'])->name('setting.update_user');
        Route::delete('setting/destroy_user/{id}', [SettingController::class, 'destroy_user'])->name('setting.destroy_user');
    });
    Route::prefix('kms')->group(function () {
        ///////////// KMS /////////////
        Route::get('kms', [KMSContronller::class, 'kms'])->name('kms.kms');
        Route::post('store-kms', [KMSContronller::class, 'store_kms'])->name('kms.store_kms');
        Route::get('kms/{nama_anak}', [KMSContronller::class, 'getInfo_anak'])->name('kms.info_anak');
        Route::get('data-kms', [KMSContronller::class, 'getData_kms'])->name('kms.data_kms');
        Route::delete('kms/destroy_kms/{id}', [KMSContronller::class, 'destroy_kms'])->name('kms.destroy_kms');
        ///////////// SHOW KMS /////////////
        Route::get('kms/show_kms/{id}', [KMSContronller::class, 'show_kms'])->name('kms.show_kms');
        Route::post('store-show_kms', [KMSContronller::class, 'store_show_kms'])->name('kms.store_show_kms');
    });
    Route::prefix('kb')->group(function () {
        ///////////// KB /////////////
        Route::get('kb', [KBController::class, 'kb'])->name('kb.kb');
        Route::post('store-kb', [KBController::class, 'store_kb'])->name('kb.store_kb');
        Route::get('kb/ropb/{nama_ibu}', [KBController::class, 'getInfo_kb'])->name('kb.getInfo_kb');
        Route::get('data-kb', [KBController::class, 'getData_kb'])->name('kb.data_kb');
        Route::get('kb/edit_kb/{id}', [KBController::class, 'edit_kb'])->name('kb.edit_kb');
        Route::put('kb/update_kb/{id}', [KBController::class, 'update_kb'])->name('kb.update_kb');
        // Route::delete('kms/destroy_kms/{id}', [KMSContronller::class, 'destroy_kms'])->name('kms.destroy_kms');
        // ///////////// SHOW KMS /////////////
        // Route::get('kms/show_kms/{id}', [KMSContronller::class, 'show_kms'])->name('kms.show_kms');
        // Route::post('store-show_kms', [KMSContronller::class, 'store_show_kms'])->name('kms.store_show_kms');
    });
    Route::prefix('laporan')->group(function () {
        ///////////// LAPORAN PUSKESMAS /////////////
        Route::get('puskesmas', [LaporanController::class, 'puskesmas'])->name('laporan.puskesmas');
    });
    Route::prefix('notification')->group(function () {
        Route::post('/notifications/{id}/read', [NotificationController::class, 'markAsRead'])->name('notifications.read');
        Route::get('/notifications/check', [NotificationController::class, 'checkNotifications'])->name('notifications.check');
    });
});

Route::middleware(['guest'])->group(function () {
    Route::get('login', [AuthController::class, 'index'])->name('login');
    Route::post('login', [AuthController::class, 'login'])->name('login.store');
    Route::get('register', [AuthController::class, 'showRegistrationForm'])->name('register');
    Route::post('register', [AuthController::class, 'register'])->name('register.store');
});