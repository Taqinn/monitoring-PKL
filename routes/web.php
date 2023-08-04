<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SesiController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\InstansiController;

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
Route::middleware(['guest'])->group(function(){
    Route::get('/', [SesiController::class, 'index'])->name('login');
    Route::post('/', [SesiController::class, 'login']);
});
Route::get('/home', function(){
    return redirect('/prakerin');
});
Route::middleware(['auth'])->group(function(){
    Route::get('/prakerin', [AdminController::class, 'index']);
    Route::get('/prakerin/admin', [AdminController::class, 'admin']);
    Route::get('/prakerin/guru', [AdminController::class, 'guru']);
    Route::get('/prakerin/panitia', [AdminController::class, 'panitia']);
    Route::get('/prakerin/instansi', [AdminController::class, 'instansi']);
    Route::get('/prakerin/siswa', [AdminController::class, 'siswa'])->Middleware('userAkses:siswa');


    //pengajuan
    Route::get('/prakerin/siswa/pengajuan', [AdminController::class, 'pengajuan'])->Middleware('userAkses:siswa');
    Route::get('/prakerin/siswa/tambah', [AdminController::class, 'addpengajuan'])->Middleware('userAkses:siswa');
    Route::post('/prakerin/pengajuan/send', [AdminController::class, 'sendpengajuan'])->Middleware('userAkses:siswa');
    Route::get('/prakerin/pengajuan/delete/{id}', [AdminController::class, 'delpengajuan'])->Middleware('userAkses:siswa');
    // Route::get('/prakerin/pengajuan/edit/{id}', [AdminController::class, 'editpengajuan'])->Middleware('userAkses:siswa');
    // Route::post('/prakerin/pengajuan/savepengajuan/{id}', [AdminController::class, 'savepengajuan'])->Middleware('userAkses:siswa');
    Route::get('/prakerin/admin/pengajuan', [AdminController::class, 'pengajuanpkl']);
    Route::get('/prakerin/admin/pengajuan', [AdminController::class, 'pengajuanpkl']);
    Route::get('/prakerin/admin/pengajuan', [AdminController::class, 'pengajuanpkl']);
    Route::get('/prakerin/admin/terima/{id}', [AdminController::class, 'terima']);
    Route::get('/prakerin/admin/tolak/{id}', [AdminController::class, 'tolak']);
    Route::get('/prakerin/admin/batal/{id}', [AdminController::class, 'batal']);
    //absensi
    Route::get('/prakerin/absensi', [AdminController::class, 'absensi'])->Middleware('userAkses:siswa');
    Route::post('/prakerin/absensi/send', [AdminController::class, 'send'])->Middleware('userAkses:siswa');
    Route::get('/prakerin/admin', [AdminController::class, 'showabsen']);
    //siswa
    Route::get('/prakerin/admin/daftar-siswa/{role}', [AdminController::class, 'showsiswa']);
    Route::get('/prakerin/admin/addsiswa', [AdminController::class, 'addsiswa']);
    Route::post('/prakerin/admin/savesiswa/{id}', [AdminController::class, 'savesiswa']);
    Route::post('/prakerin/admin/upload-siswa', [AdminController::class, 'uploadsiswa']);
    Route::get('/prakerin/admin/delete-siswa/{id}', [AdminController::class, 'deletesiswa']);
    Route::get('/prakerin/admin/edit-siswa/{id}', [AdminController::class, 'editsiswa']);
    //guru
    Route::get('/prakerin/admin/daftar-guru/{role}', [AdminController::class, 'showguru'])->name('submit.siswa');
    Route::get('/prakerin/admin/delete-guru/{id}', [AdminController::class, 'deleteguru'])->name('submit.siswa');
    Route::get('/prakerin/admin/edit-guru/{id}', [AdminController::class, 'editguru']);
    Route::get('/prakerin/admin/addguru', [AdminController::class, 'addguru']);
    Route::post('/prakerin/admin/upload-guru', [AdminController::class, 'uploadguru']);
    Route::post('/prakerin/admin/save-guru/{id}', [AdminController::class, 'saveguru']);
    
    //daftar jurusan
    Route::get('/prakerin/admin/daftar-jurusan/{role}', [AdminController::class, 'jurusan']);
    Route::post('/prakerin/admin/daftar-jurusan/upload', [AdminController::class, 'addjurusan']);
    Route::get('/prakerin/admin/delete-jurusan/{id}', [AdminController::class, 'deljurusan']);
    Route::get('/prakerin/admin/edit-jurusan/{id}', [AdminController::class, 'editjurusan']);
    Route::post('/prakerin/admin/savejurusan/{id}', [AdminController::class, 'savejurusan']);

    //tempat pkl
    Route::get('/prakerin/admin/tempat-pkl', [AdminController::class, 'showpkl']);
    Route::get('/prakerin/admin/addpkl', [AdminController::class, 'addpkl']);
    Route::post('/prakerin/admin/upload-pkl', [AdminController::class, 'uploadpkl']);
    Route::get('/prakerin/admin/editpkl/{id}', [AdminController::class, 'editpkl']);
    Route::get('/prakerin/admin/delpkl/{id}', [AdminController::class, 'delpkl']);
    Route::post('/prakerin/admin/savepkl/{id}', [AdminController::class, 'savepkl']);
    //rekomendasi
    Route::get('/prakerin/admin/rekomendasi-pkl', [AdminController::class, 'showrekomen']);
    Route::get('/prakerin/admin/addrekomendasi', [AdminController::class, 'addreko']);
    Route::post('/prakerin/admin/uploadrekomen', [AdminController::class, 'uploadreko']);
    Route::get('/prakerin/admin/editreko/{id}', [AdminController::class, 'editreko']);
    Route::post('/prakerin/admin/savereko/{id}', [AdminController::class, 'savereko']);
    Route::get('/prakerin/admin/hapusreko/{id}', [AdminController::class, 'delreko']);
    //absen
    Route::get('/prakerin/admin/delabsen/{id}', [AdminController::class, 'delabsen']);
    //monitoring
    Route::get('/prakerin/admin/monitoring', [AdminController::class, 'monitoring']);
    //nilai
    Route::get('/prakerin/admin/nilai', [AdminController::class, 'nilai']);
    Route::get('/prakerin/admin/give-nilai/{id}', [AdminController::class, 'givenilai']);
    Route::post('/prakerin/admin/sendnilai/{id}', [AdminController::class, 'sendnilai']);
    
    //user
    Route::get('/prakerin/data-tempat', [AdminController::class, 'datatempat']);
    Route::get('/prakerin/tempatpkl', [AdminController::class, 'tempatpkl']);
    Route::get('/prakerin/nilaipkl', [AdminController::class, 'nilaipkl']);
    // Route::get('/prakerin/nilaipkl', [AdminController::class, 'nilaippkl']);

    //Instansi
    Route::get('/prakerin/instansi/kehadiran',[InstansiController::class, 'kehadiran']);
    Route::get('/prakerin/instansi/hadir/{id}',[InstansiController::class, 'hadir']);
    Route::get('/prakerin/instansi/nonhadir/{id}',[InstansiController::class, 'nonhadir']);
    //Nilai
    Route::get('/prakerin/instansi/nilai',[InstansiController::class, 'nilai']);
    Route::get('/prakerin/instansi/give-nilai/{id}',[InstansiController::class, 'give']);
    Route::post('/prakerin/instansi/sendnilai/{id}',[InstansiController::class, 'send']);

    //Instansi
    Route::get('/prakerin/admin/daftar-instansi/{role}', [InstansiController::class, 'instansi']);
    Route::get('/prakerin/admin/addinstansi', [InstansiController::class, 'addinstansi']);
    Route::post('/prakerin/admin/upload-instansi', [InstansiController::class, 'uploadinstansi']);
    Route::get('/prakerin/admin/delete-instansi/{id}', [InstansiController::class, 'delete']);
    Route::get('/prakerin/admin/edit-instansi/{id}', [InstansiController::class, 'edit']);
    Route::post('/prakerin/admin/post-instansi/{id}', [InstansiController::class, 'postedit']);
    
    //logout
    Route::get('/logout', [SesiController::class, 'logout']);
});