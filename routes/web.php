<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InstitusiController;
use App\Http\Controllers\KerjasamaController;
use App\Http\Controllers\TestimoniController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\KerjasamaAdminController;
use App\Http\Controllers\PermohonanAdminController;
use App\Http\Controllers\LandingPageController;
use App\Models\Institusi;
use App\Models\Testimoni;
use App\Models\Notifikasi;
use App\Models\Kerjasama;
use App\Models\Daftar_mou;
use App\Models\Dokumen;
use App\Models\Perusahaan;
use App\Models\Nama_pimpinan;
use App\Models\Gallery;
use App\Models\Berita;
use App\Models\Jenis;
use App\Models\Mou;


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



Route::get('/', [App\Http\Controllers\IndexController::class, 'index']);
Route::get('/register', [App\Http\Controllers\SiteController::class, 'register'])->middleware('auth', 'verified');
Auth::routes(['verify' => true]);
Route::get('/verify', [App\Http\Controllers\SiteController::class, 'verify']);
Route::get('/login', [App\Http\Controllers\LoginController::class, 'index'])->name('login');
Route::post('/login/auth', [App\Http\Controllers\LoginController::class, 'auth']);
Route::get('/logout', [App\Http\Controllers\LoginController::class, 'logout']);
Route::get('/detail-berita/{id}', [App\Http\Controllers\BeritaController::class, 'detail']);
Route::get('/loginadmin', [App\Http\Controllers\AdminController::class, 'login']);
Route::post('/loginadmin/auth', [App\Http\Controllers\AdminController::class, 'auth']);


route::middleware(['auth:institusi','verified'])->group(function () {
    Route::get('/inputprofil', [App\Http\Controllers\ProfilController::class, 'profil']);
    Route::post('/input/store', [App\Http\Controllers\ProfilController::class, 'store']);
    Route::get('/input/edit/{id}', [App\Http\Controllers\ProfilController::class, 'edit']);
    Route::post('/input/update/{id}', [App\Http\Controllers\ProfilController::class, 'update']);
    // Route::get('/input/pimpinan/{id}', [App\Http\Controllers\ProfilController::class, 'inputpimpinan']);
    Route::get('/input/pimpinan', [App\Http\Controllers\ProfilController::class, 'inputpimpinan']);
    Route::get('/pimpinan', [App\Http\Controllers\ProfilController::class, 'pimpinan']);
    Route::post('/input-pimpinan/store', [App\Http\Controllers\ProfilController::class, 'inputstore']);


    Route::get('/input-kerjasama', [App\Http\Controllers\KerjasamaController::class, 'input']);
    Route::post('/input-kerjasama/simpan', [App\Http\Controllers\KerjasamaController::class, 'simpan']);
    Route::get('/kerjasama/detail-pkl/{id}', [App\Http\Controllers\KerjasamaController::class, 'detail']);


    Route::get('/input-teaching', [App\Http\Controllers\KerjasamaController::class, 'inputteaching']);
    Route::post('/input-teaching/simpan', [App\Http\Controllers\KerjasamaController::class, 'simpanteaching']);
    Route::get('/kerjasama/detail-teaching/{id}', [App\Http\Controllers\KerjasamaController::class, 'detailteaching']);


    Route::get('/input-kunjin', [App\Http\Controllers\KerjasamaController::class, 'inputkunjin']);
    Route::post('/input-kunjin/simpan', [App\Http\Controllers\KerjasamaController::class,'simpankunjin']);
    Route::get('/kerjasama/detail-kunjin/{id}', [App\Http\Controllers\KerjasamaController::class, 'detailkunjin']);


    Route::get('/input-guru-tamu', [App\Http\Controllers\KerjasamaController::class, 'inputgurutamu']);
    Route::post('/input-guru-tamu/simpan', [App\Http\Controllers\KerjasamaController::class, 'simpangurutamu']);
    Route::get('/kerjasama/detail-gurutamu/{id}', [App\Http\Controllers\KerjasamaController::class, 'detailgurutamu']);

    Route::get('/input-kurikulum', [App\Http\Controllers\KerjasamaController::class, 'inputkurikulum']);
    Route::post('/input-kurikulum/simpan', [App\Http\Controllers\KerjasamaController::class, 'simpankurikulum']);
    Route::get('/kerjasama/detail-kurikulum/{id}', [App\Http\Controllers\KerjasamaController::class, 'detailkurikulum']);

    Route::get('/input-ujikom', [App\Http\Controllers\KerjasamaController::class, 'inputujikom']);
    Route::post('/input-ujikom/simpan', [App\Http\Controllers\KerjasamaController::class,'simpanujikom']);
    Route::get('/kerjasama/detail-ujikom/{id}', [App\Http\Controllers\KerjasamaController::class, 'detailujikom']);

    Route::get('/input-rekrut', [App\Http\Controllers\KerjasamaController::class, 'inputrekrut']);
    Route::post('/input-rekrut/simpan', [App\Http\Controllers\KerjasamaController::class,'simpanrekrut']);
    Route::get('/kerjasama/detail-rekrut/{id}', [App\Http\Controllers\KerjasamaController::class, 'detailrekrut']);
    
    Route::get('/input-magang', [App\Http\Controllers\KerjasamaController::class, 'inputmagang']);
    Route::post('/input-magang-guru/simpan', [App\Http\Controllers\KerjasamaController::class,'simpanmagang']);
    Route::get('/kerjasama/detail-magang/{id}', [App\Http\Controllers\KerjasamaController::class, 'detailmagang']);
    
    Route::get('/input-suvervisi', [App\Http\Controllers\KerjasamaController::class, 'inputsuvervisi']);
    Route::post('/input-suvervisi/simpan', [App\Http\Controllers\KerjasamaController::class,'simpansuvervisi']);
    Route::get('/kerjasama/detail-suvervisi/{id}', [App\Http\Controllers\KerjasamaController::class, 'detailsuvervisi']);


    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'dashboard'])->middleware('profil');
    Route::get('/permohonan', [App\Http\Controllers\PermohonanController:: class, 'index']);
    Route::post('/permohonan/send', [App\Http\Controllers\PermohonanController:: class, 'store']);
    Route::get('/datapermohonan', [App\Http\Controllers\PermohonanController:: class, 'data']);
    Route::get('/detailpermohonan/{id}', [App\Http\Controllers\PermohonanController:: class, 'detail']);
    Route::get('/datapermohonan/detail/{id}', [App\Http\Controllers\PermohonanController::class, 'detailtabel']);
    Route::get('/institusi/download-mou/{id}', [App\Http\Controllers\PermohonanController:: class, 'download']);
    

    Route::get('/kerjasama', [App\Http\Controllers\KerjasamaController::class, 'index']);
    Route::get('/riwayat', [App\Http\Controllers\KerjasamaController::class, 'riwayat']);
    Route::get('/riwayatpermohonan', [App\Http\Controllers\PermohonanController::class, 'riwayat']);

    Route::get('/kalender', [App\Http\Controllers\InstitusiController::class, 'kalender']);


});
route::middleware('auth:admin')->group(function(){

    Route::get('/dashboard-admin', [App\Http\Controllers\AdminController::class, 'index']);

    // Route::get('/admin/input-permohonan-admin', [App\Http\Controllers\PermohonanAdminController:: class, 'input']);
    // Route::post('/admin/input-permohonan-admin/simpan', [App\Http\Controllers\PermohonanAdminController:: class, 'simpan']);

    Route::get('/admin/edit/{id}', [App\Http\Controllers\AdminController::class, 'profiledit']);
    Route::post('/admin/update/{id}', [App\Http\Controllers\AdminController::class, 'update']);
    Route::get('/admin/edit-perusahaan/{id}', [App\Http\Controllers\AdminController::class, 'perusahaanedit']);
    Route::post('/admin/update-perusahaan/{id}', [App\Http\Controllers\AdminController::class, 'perusahaanupdate']);


    Route::get('/admin/input-detail', [App\Http\Controllers\PermohonanAdminController::class, 'input']);
    Route::post('/admin/input-detail/simpan', [App\Http\Controllers\PermohonanAdminController::class, 'simpan']);
    Route::get('/admin/tabel-jenis', [App\Http\Controllers\PermohonanAdminController::class, 'tabel']);
    Route::get('/admin/tabel-jenis/hapus/{id}', [App\Http\Controllers\PermohonanAdminController::class, 'hapus']);
    Route::get('/admin/edit-jenis/{id}', [App\Http\Controllers\PermohonanAdminController::class, 'edit']);
    Route::post('/admin/jenis/update/{id}', [App\Http\Controllers\PermohonanAdminController::class, 'update']);

    Route::get('/admin/permohonan-admin', [App\Http\Controllers\PermohonanAdminController:: class, 'permohonan']);
    Route::get('/update-diterima/{id}', [App\Http\Controllers\PermohonanAdminController:: class, 'diterima']);
    Route::get('/update-ditolak/{id}', [App\Http\Controllers\PermohonanAdminController:: class, 'ditolak']);
    Route::get('/admin/daftar-permohonan/hapus/{id}', [App\Http\Controllers\PermohonanAdminController::class, 'hapustabel']);
    Route::get('/admin/download-mou/{id}', [App\Http\Controllers\PermohonanAdminController:: class, 'download']);
    Route::get('/admin/permohonan-admin/detail/{id}', [App\Http\Controllers\PermohonanAdminController::class, 'detail']);




    Route::get('/admin/riwayat-permohonan', [App\Http\Controllers\PermohonanAdminController:: class, 'riwayatpermohonan']);

    // kerjasama
    Route::get('/admin/daftar-kerjasama', [App\Http\Controllers\KerjasamaAdminController::class, 'kerjasama']);
    Route::get('/admin/daftar-kerjasama/hapus/{id}', [App\Http\Controllers\KerjasamaAdminController::class, 'hapus']);
    Route::get('/admin/kerjasama/detail-pkl/{id}', [App\Http\Controllers\KerjasamaAdminController::class, 'detail']);
    Route::get('/admin/kerjasama/detail-gurutamu/{id}', [App\Http\Controllers\KerjasamaAdminController::class, 'detailgurutamu']);
    Route::get('/admin/kerjasama/detail-teaching/{id}', [App\Http\Controllers\KerjasamaAdminController::class, 'detailteaching']);
    Route::get('/admin/kerjasama/detail-kunjin/{id}', [App\Http\Controllers\KerjasamaAdminController::class, 'detailkunjin']);
    Route::get('/admin/kerjasama/detail-kurikulum/{id}', [App\Http\Controllers\KerjasamaAdminController::class, 'detailkurikulum']);
    Route::get('/admin/kerjasama/detail-ujikom/{id}', [App\Http\Controllers\KerjasamaAdminController::class, 'detailujikom']);
    Route::get('/admin/kerjasama/detail-rekrut/{id}', [App\Http\Controllers\KerjasamaAdminController::class, 'detailrekrut']);
    Route::get('/admin/kerjasama/detail-magang/{id}', [App\Http\Controllers\KerjasamaAdminController::class, 'detailmagang']);
    Route::get('/admin/kerjasama/detail-suvervisi/{id}', [App\Http\Controllers\KerjasamaAdminController::class, 'detailsuvervisi']);




    Route::get('/admin/daftar-riwayat', [App\Http\Controllers\KerjasamaAdminController::class, 'riwayatkerjasama']);
    Route::get('/admin/kalender-admin', [App\Http\Controllers\AdminController::class, 'kalender']);

    Route::get('/dokument', [App\Http\Controllers\AdminController::class, 'dokument']);
    Route::get('/admin/dokumen/hapus/{id}', [App\Http\Controllers\AdminController::class, 'hapus']);

    Route::get('/admin/tabel-testimoni', [App\Http\Controllers\TestimoniController::class, 'tabeltestimoni']);
    Route::post('/admin/input-testimoni/simpan', [App\Http\Controllers\TestimoniController::class, 'store']);
    Route::get('/admin/input-testimoni', [App\Http\Controllers\TestimoniController::class, 'inputtestimoni']);
    Route::get('/admin/tabel-testimoni/hapus/{id}', [App\Http\Controllers\TestimoniController::class, 'hapus']);
    Route::get('/admin/edit-testimoni/{id}', [App\Http\Controllers\TestimoniController::class, 'edit']);
    Route::post('/admin/testimoni/update/{id}', [App\Http\Controllers\TestimoniController::class, 'update']);

    Route::get('/admin/input-berita', [App\Http\Controllers\BeritaController::class, 'input']);
    Route::get('/admin/tabel-berita', [App\Http\Controllers\BeritaController::class, 'tabel']);
    Route::get('/admin/tabel-berita/hapus/{id}', [App\Http\Controllers\BeritaController::class, 'hapus']);
    Route::get('/admin/edit-berita/{id}', [App\Http\Controllers\BeritaController::class, 'edit']);
    Route::post('/admin/update/{id}', [App\Http\Controllers\BeritaController::class, 'update']);
    Route::post('/admin/input-berita/simpan', [App\Http\Controllers\BeritaController::class, 'simpan']);
    

    
    Route::get('/admin/tabel-galeri', [App\Http\Controllers\GalleryController::class, 'index']);
    Route::get('/admin/input-galeri', [App\Http\Controllers\GalleryController::class, 'input']);
    Route::post('/admin/input-galeri/simpan', [App\Http\Controllers\GalleryController::class, 'store']);
    Route::get('/admin/tabel-galeri/hapus/{id}', [App\Http\Controllers\GalleryController::class, 'hapus']);

    
    Route::get('/admin/tabel-deskripsi', [App\Http\Controllers\LandingPageController::class, 'index']);
    Route::get('/admin/deskripsi-profil', [App\Http\Controllers\LandingPageController::class, 'tambah']);
    Route::post('/admin/deskripsi-profil/simpan', [App\Http\Controllers\LandingPageController::class, 'store']);
    Route::get('/admin/edit-deskripsi-profil/{id}', [App\Http\Controllers\LandingPageController::class, 'edit']);
    Route::post('/admin/update-deskripsi/{id}', [App\Http\Controllers\LandingPageController::class, 'update']);

    Route::get('/admin/tabel-pertanyaan', [App\Http\Controllers\PertanyaanController::class, 'index']);
    Route::get('/admin/input-pertanyaan', [App\Http\Controllers\PertanyaanController::class, 'tambah']);
    Route::post('/admin/input-pertanyaan/simpan', [App\Http\Controllers\PertanyaanController::class, 'store']);
    Route::get('/admin/edit-pertanyaan/{id}', [App\Http\Controllers\PertanyaanController::class, 'edit']);
    Route::post('/admin/update-pertanyaan/{id}', [App\Http\Controllers\PertanyaanController::class, 'update']);
    Route::get('/admin/pertanyaan/hapus/{id}', [App\Http\Controllers\PertanyaanController::class, 'hapus']);

});

