<?php


use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\INCController;
use App\Http\Controllers\KMSContronller;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\MasterController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\PNCController;
use App\Http\Controllers\ANCController;
use App\Http\Controllers\SettingController;
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
    Route::get('pasien/anak/{nama_ibu}', [PasienController::class, 'getInfo_ibu'])->name('pasien.info_ibu');
    Route::get('pasien/edit_anak/{id}', [PasienController::class, 'edit_anak'])->name('pasien.edit_anak');
    Route::put('pasien/update_anak/{id}', [PasienController::class, 'update_anak'])->name('pasien.update_anak');
    Route::delete('pasien/destroy_anak/{id}', [PasienController::class, 'destroy_anak'])->name('pasien.destroy_anak');
    Route::get('pasien/edit_ibu/{id}', [PasienController::class, 'edit_ibu'])->name('pasien.edit_ibu');
    Route::put('pasien/update_ibu/{id}', [PasienController::class, 'update_ibu'])->name('pasien.update_ibu');
    Route::delete('pasien/destroy_ibu/{id}', [PasienController::class, 'destroy_ibu'])->name('pasien.destroy_ibu');
});
Route::prefix('antenatal_care')->group(function () {
    ///////////// PEMERIKSAAN DOKTER TM1 /////////////
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
    Route::delete('antenatal_care/destroy_anc/{id}', [ANCController::class, 'destroy_anc'])->name('antenatal_care.destroy_anc');
    ///////////// SHOW ANC /////////////
    Route::post('store-show_anc', [ANCController::class, 'store_showanc'])->name('antenatal_care.store_showanc');
    Route::get('anc/show_anc/{id}', [ANCController::class, 'show_anc'])->name('antenatal_care.show_anc');
    Route::get('data-show_anc/{NIK}', [ANCController::class, 'getData_showanc'])->name('antenatal_care.data_showanc');
    Route::get('show_anc/edit_showanc/{id}', [ANCController::class, 'edit_showanc'])->name('antenatal_care.edit_showanc');
    Route::put('show_anc/update_showanc/{id}', [ANCController::class, 'update_showanc'])->name('antenatal_care.update_showanc');
    ///////////// PEMERIKSAAN BIDAN/DOKTER SAAT K1 /////////////
    Route::get('ropb', [ANCController::class, 'ropb'])->name('antenatal_care.ropb');
    Route::post('store-ropb', [ANCController::class, 'store_ropb'])->name('antenatal_care.store_ropb');
    Route::get('data-ropb', [ANCController::class, 'getData_ropb'])->name('antenatal_care.data_ropb');
    Route::get('antenatal_care/show_ropb/{id}', [ANCController::class, 'show_ropb'])->name('antenatal_care.show_ropb');
    Route::get('antenatal_care/edit_ropb/{id}', [ANCController::class, 'edit_ropb'])->name('antenatal_care.edit_ropb');
    Route::put('antenatal_care/update_ropb/{id}', [ANCController::class, 'update_ropb'])->name('antenatal_care.update_ropb');
    Route::delete('antenatal_care/destroy_ropb/{id}', [ANCController::class, 'destroy_ropb'])->name('antenatal_care.destroy_ropb');
    ///////////// RENCANA PERSALINAN /////////////
    Route::get('rnca', [ANCController::class, 'rnca'])->name('antenatal_care.rnca_persalinan');
    Route::post('store-rnca', [ANCController::class, 'store_rnca'])->name('antenatal_care.store_rnca');
    Route::get('data-rnca', [ANCController::class, 'getData_rnca'])->name('antenatal_care.data_rnca');
    Route::get('antenatal_care/show_rnca/{id}', [ANCController::class, 'show_rnca'])->name('antenatal_care.show_rnca');
    Route::get('antenatal_care/edit_rnca/{id}', [ANCController::class, 'edit_rnca'])->name('antenatal_care.edit_rnca');
    Route::put('antenatal_care/update_rnca/{id}', [ANCController::class, 'update_rnca'])->name('antenatal_care.update_rnca');
    Route::delete('antenatal_care/destroy_rnca/{id}', [ANCController::class, 'destroy_rnca'])->name('antenatal_care.destroy_rnca');
    ///////////// PEMERIKSAAN DOKTER TM3 /////////////
    Route::get('tm3', [ANCController::class, 'tm3'])->name('antenatal_care.tm3');
    Route::post('store-tm3', [ANCController::class, 'store_tm3'])->name('antenatal_care.store_tm3');
    Route::get('data-tm3', [ANCController::class, 'getData_tm3'])->name('antenatal_care.data_tm3');
    Route::put('antenatal_care/update_tm3/{id}', [ANCController::class, 'update_tm3'])->name('antenatal_care.update_tm3');
    Route::delete('antenatal_care/destroy_tm3/{id}', [ANCController::class, 'destroy_tm3'])->name('antenatal_care.destroy_tm3');
    Route::get('antenatal_care/edit_tm3/{id}', [ANCController::class, 'edit_tm3'])->name('antenatal_care.edit_tm3');
    Route::get('antenatal_care/show_tm3/{id}', [ANCController::class, 'show_tm3'])->name('antenatal_care.show_tm3');
});
Route::prefix('intranatal_care')->group(function () {
    ///////////// MASA PERSALINAN /////////////
    Route::get('persalinan', [INCController::class, 'Persalinan'])->name('intranatal_care.persalinan');
    Route::post('store-persalinan', [INCController::class, 'store_persalinan'])->name('intranatal_care.store_persalinan');
    Route::get('data-persalinan', [INCController::class, 'getData_persalinan'])->name('intranatal_care.data_persalinan');
    Route::get('intranatal_care/show_persalinan/{id}', [INCController::class, 'show_persalinan'])->name('intranatal_care.show_persalinan');
    Route::get('intranatal_care/edit_persalinan/{id}', [INCController::class, 'edit_persalinan'])->name('intranatal_care.edit_persalinan');
    Route::put('intranatal_care/update_persalinan/{id}', [INCController::class, 'update_persalinan'])->name('intranatal_care.update_persalinan');
    Route::delete('intranatal_care/destroy_persalinan/{id}', [INCController::class, 'destroy_persalinan'])->name('intranatal_care.destroy_persalinan');
});
Route::prefix('postnatal_care')->group(function () {
    ///////////// MASA NIFAS /////////////
    Route::get('nifas', [PNCController::class, 'nifas'])->name('postnatal_care.nifas');
    Route::post('store-nifas', [PNCController::class, 'store_nifas'])->name('postnatal_care.store_nifas');
    Route::get('data-nifas', [PNCController::class, 'getData_nifas'])->name('postnatal_care.data_nifas');
    Route::delete('postnatal_care/destroy_nifas/{id}', [PNCController::class, 'destroy_nifas'])->name('postnatal_care.destroy_nifas');
    ///////////// SHOW NIFAS /////////////
    Route::post('store-show_nifas', [PNCController::class, 'store_shownifas'])->name('postnatal_care.store_shownifas');
    Route::get('nifas/show_nifas/{id}', [PNCController::class, 'show_nifas'])->name('postnatal_care.show_nifas');
    Route::get('data-show_nifas/{NIK}', [PNCController::class, 'getData_shownifas'])->name('postnatal_care.data_shownifas');
    Route::get('show_nifas/edit_shownifas/{id}', [PNCController::class, 'edit_shownifas'])->name('postnatal_care.edit_shownifas');
    Route::put('show_anc/update_shownifas/{id}', [PNCController::class, 'update_shownifas'])->name('postnatal_care.update_shownifas');
    ///////////// PEMANTAUAN PPIA /////////////
    Route::get('ppia', [PNCController::class, 'ppia'])->name('postnatal_care.ppia');
    Route::post('store-ppia', [PNCController::class, 'store_ppia'])->name('postnatal_care.store_ppia');
    Route::get('data-ppia', [PNCController::class, 'getData_ppia'])->name('postnatal_care.data_ppia');
    Route::delete('postnatal_care/destroy_ppia/{id}', [PNCController::class, 'destroy_ppia'])->name('postnatal_care.destroy_ppia');
    ///////////// SHOW PEMANTAUAN PPIA /////////////
    Route::post('store-show_ppia', [PNCController::class, 'store_showppia'])->name('postnatal_care.store_showppia');
    Route::get('ppia/show_ppia/{id}', [PNCController::class, 'show_ppia'])->name('postnatal_care.show_ppia');
    Route::get('data-show_ppia/{NIK}', [PNCController::class, 'getData_showppia'])->name('postnatal_care.data_showppia');
    Route::get('show_ppia/edit_showppia/{id}', [PNCController::class, 'edit_showppia'])->name('postnatal_care.edit_showppia');
    Route::put('show_ppia/update_showppia/{id}', [PNCController::class, 'update_showppia'])->name('postnatal_care.update_showppia');
    ///////////// PEMANTAUAN BAYI /////////////
    Route::get('pemantauan_bayi', [PNCController::class, 'pemantauan_bayi'])->name('postnatal_care.pemantauan_bayi');
    Route::post('store-pemantauan_bayi', [PNCController::class, 'store_pemantauan_bayi'])->name('postnatal_care.store_pemantauan_bayi');
    Route::get('data-pemantauan_bayi', [PNCController::class, 'getData_pemantauan_bayi'])->name('postnatal_care.data_pemantauan_bayi');
    Route::delete('postnatal_care/destroy_pemantauan_bayi/{id}', [PNCController::class, 'destroy_pemantauan_bayi'])->name('postnatal_care.destroy_pemantauan_bayi');
    ///////////// PEMANTAUAN BAYI IBU HEPATITIS B/////////////
    Route::get('pemantauan_bayi/show_hepatitis/{id}', [PNCController::class, 'show_hepatitis'])->name('postnatal_care.show_hepatitis');
    Route::post('store-show_hepatitis', [PNCController::class, 'store_showhepatitis'])->name('postnatal_care.store_showhepatitis');
    Route::get('show_hepatitis/edit_showhepatitis/{id}', [PNCController::class, 'edit_showhepatitis'])->name('postnatal_care.edit_showhepatitis');
    Route::put('show_hepatitis/update_showhepatitis/{id}', [PNCController::class, 'update_showhepatitis'])->name('postnatal_care.update_showhepatitis');
    ///////////// PEMANTAUAN BAYI IBU HIV/////////////
    Route::get('pemantauan_bayi/show_hiv/{id}', [PNCController::class, 'show_hiv'])->name('postnatal_care.show_hiv');
    Route::post('store-show_hiv', [PNCController::class, 'store_showhiv'])->name('postnatal_care.store_showhiv');
    Route::get('show_hiv/edit_showhiv/{id}', [PNCController::class, 'edit_showhiv'])->name('postnatal_care.edit_showhiv');
    Route::put('show_hiv/update_showhiv/{id}', [PNCController::class, 'update_showhiv'])->name('postnatal_care.update_showhiv');
    ///////////// PEMANTAUAN BAYI IBU SIFILIS/////////////
    Route::get('pemantauan_bayi/show_sifilis/{id}', [PNCController::class, 'show_sifilis'])->name('postnatal_care.show_sifilis');
    Route::post('store-show_sifilis', [PNCController::class, 'store_showsifilis'])->name('postnatal_care.store_showsifilis');
    Route::get('show_sifilis/edit_showsifilis/{id}', [PNCController::class, 'edit_showsifilis'])->name('postnatal_care.edit_showsifilis');
    Route::put('show_sifilis/update_showsifilis/{id}', [PNCController::class, 'update_showsifilis'])->name('postnatal_care.update_showsifilis');
});
Route::prefix('setting')->group(function () {
    Route::get('role', [SettingController::class, 'role'])->name('setting.role');
    Route::post('store-role', [SettingController::class, 'store_role'])->name('setting.store_role');
    Route::get('data-role', [SettingController::class, 'getData_role'])->name('setting.data_role');
    Route::get('setting/edit_role/{id}', [SettingController::class, 'edit_role'])->name('setting.edit_role');
    Route::put('setting/update_role/{id}', [SettingController::class, 'update_role'])->name('setting.update_role');
    Route::delete('setting/destroy_role/{id}', [SettingController::class, 'destroy_role'])->name('setting.destroy_role');
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

Route::prefix('master')->group(function () {
    Route::get('pasien', [MasterController::class, 'pasien'])->name('master.pasien');
});
