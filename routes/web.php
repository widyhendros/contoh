<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginRegister;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Adminsiswacontroller;
use App\Http\Controllers\TahunajaranController;

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
    return redirect()->route('login');
});

// Route::middleware(['auth'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');


Route::middleware(['auth'])->group(function () {

    //Siswa
    Route::get('/page/siswa/tambahsiswa/{id}', [SiswaController::class, 'tambah'])->name('tambahsiswa');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::middleware(['admin'])->group(function () {
        Route::get('/page/siswa/siswa', [SiswaController::class, 'index'])->name('siswa');
        Route::get('/page/siswa/siswabaru', [SiswaController::class, 'siswabaru'])->name('siswabaru');
        Route::get('/page/siswa/siswamutasi', [SiswaController::class, 'siswamutasi'])->name('siswamutasi');
        Route::get('/page/siswa/admintambahsiswa', [Adminsiswacontroller::class, 'tambah'])->name('admintambahsiswa');

        //Kelas
        Route::get('/page/kelas/alokasikelas', [KelasController::class, 'index'])->name('alokasikelas');
        Route::get('/page/kelas/setkelas/{id}', [KelasController::class, 'setkelas'])->name('setkelas');
        Route::get('/page/kelas/detailkelas/{id}', [KelasController::class, 'detailkelas'])->name('detailkelas');
    });

    Route::middleware(['admin'])->group(function () {
        Route::get('/page/siswa/siswa', [SiswaController::class, 'index'])->name('siswa');
        // Route::get('/page/siswa/siswabaru', [SiswaController::class, 'siswabaru'])->name('siswabaru');
        Route::get('/page/siswa/siswamutasi', [SiswaController::class, 'siswamutasi'])->name('siswamutasi');
        // Route::get('/page/siswa/admintambahsiswa', [Adminsiswacontroller::class, 'tambah'])->name('admintambahsiswa');

        // //Kelas
        // Route::get('/page/kelas/alokasikelas', [KelasController::class, 'index'])->name('alokasikelas');
        // Route::get('/page/kelas/setkelas/{id}', [KelasController::class, 'setkelas'])->name('setkelas');
        // Route::get('/page/kelas/detailkelas/{id}', [KelasController::class, 'detailkelas'])->name('detailkelas');
    });
});

////////////post//////////////////////////////
Route::post('/page/siswa/insertpribadisiswa', [SiswaController::class, 'insertpribadisiswa'])->name('insertpribadisiswa');
Route::post('/page/siswa/inserttempattinggal', [SiswaController::class, 'inserttempattinggal'])->name('inserttempattinggal');
Route::post('/page/siswa/inserttandabadan', [SiswaController::class, 'inserttandabadan'])->name('inserttandabadan');
Route::post('/page/siswa/insertdatapendidikan', [SiswaController::class, 'insertdatapendidikan'])->name('insertdatapendidikan');
Route::post('/page/siswa/insertorangtuawali', [SiswaController::class, 'insertorangtuawali'])->name('insertorangtuawali');
Route::post('/page/siswa/inserthobidanminat', [SiswaController::class, 'inserthobidanminat'])->name('inserthobidanminat');
Route::post('/page/siswa/insertpeminatan', [SiswaController::class, 'insertpeminatan'])->name('insertpeminatan');
Route::post('/page/siswa/insertfileberkas', [SiswaController::class, 'insertfileberkas'])->name('insertfileberkas');
Route::post('/page/user/adduser', [UserController::class, 'adduser'])->name('adduser');

//////////////////editadmin///////////////////
Route::post('/page/siswa/admininsertpribadisiswa', [Adminsiswacontroller::class, 'insertpribadisiswa'])->name('admininsertpribadisiswa');
Route::post('/page/siswa/admininserttempattinggal', [Adminsiswacontroller::class, 'inserttempattinggal'])->name('admininserttempattinggal');
Route::post('/page/siswa/admininserttandabadan', [Adminsiswacontroller::class, 'inserttandabadan'])->name('admininserttandabadan');
Route::post('/page/siswa/admininsertdatapendidikan', [Adminsiswacontroller::class, 'insertdatapendidikan'])->name('admininsertdatapendidikan');
Route::post('/page/siswa/admininsertorangtuawali', [Adminsiswacontroller::class, 'insertorangtuawali'])->name('admininsertorangtuawali');
Route::post('/page/siswa/admininserthobidanminat', [Adminsiswacontroller::class, 'inserthobidanminat'])->name('admininserthobidanminat');
Route::post('/page/siswa/admininsertfileberkas', [Adminsiswacontroller::class, 'insertfileberkas'])->name('admininsertfileberkas');
Route::post('/page/siswa/admininsertpeminatan', [Adminsiswacontroller::class, 'insertpeminatan'])->name('admininsertpeminatan');

///////////mutasi//////////////////////
Route::post('/page/siswa/admininsertmutasi', [Adminsiswacontroller::class, 'insertmutasi'])->name('admininsertmutasi');

/////////Kelas///////////////
Route::post('/page/siswa/admininsertkelas', [Kelascontroller::class, 'insertkelas'])->name('admininsertkelas');
Route::post('/page/siswa/adminupdatekelas', [Kelascontroller::class, 'updatekelas'])->name('adminupdatekelas');
Route::post('/page/siswa/kelasinsertsiswa', [Kelascontroller::class, 'kelasinsertsiswa'])->name('kelasinsertsiswa');

////////setactive tahun ajaran/////////////////
Route::get('/page/tahunajaran/tahunajaran', [TahunajaranController::class, 'index'])->name('tahunajaran');
Route::get('/page/siswa/admininsetaktif/{id}', [TahunajaranController::class, 'setactive'])->name('admininsetaktif');
Route::post('/page/siswa/admininsertthnpelajaran', [TahunajaranController::class, 'insertthnpelajaran'])->name('admininsertthnpelajaran');
Route::post('/page/siswa/adminupdatethnpelajaran', [TahunajaranController::class, 'updatethnpelajaran'])->name('adminupdatethnpelajaran');
Route::get('/page/siswa/getDataById', [TahunajaranController::class, 'getDataById'])->name('getDataById');

///////////////////Delete//////////////////////////////////////
Route::get('/page/siswa/admindeletesiswa/{nisn}', [Adminsiswacontroller::class, 'deletesiswa'])->name('admindeletesiswa');
Route::get('/page/siswa/admindeletethnpelajaran/{id}', [TahunajaranController::class, 'deletethnpelajaran'])->name('admindeletethnpelajaran');
Route::get('/user/{id}', [UserController::class, 'deleteuser'])->name('deleteuser');
Route::post('/page/user/edituser', [UserController::class, 'edituser'])->name('edituser');
Route::get('/page/user/resetpassword{id}', [UserController::class, 'resetpassword'])->name('resetpassword');


////////////LoginRegister//////////////////////
Route::post('/postlogin', [LoginRegister::class, 'PostLogin'])->name('postlogin');
Route::post('/logoutuser', [LoginRegister::class, 'logout'])->name('logoutuser');

////////////user/////////////////////
Route::get('/page/user/user', [UserController::class, 'index'])->name('user');
Route::post('/page/user/tambahsiswa', [UserController::class, 'change_password'])->name('change_password');

////////////////excel///////////////////////////
Route::post('/upload-content-with-package',[SiswaController::class,'import_excel'])->name('upload.content.with.package');
Route::get('export', [Adminsiswacontroller::class, 'export_excel'])->name('export_excel');
Route::get('/exportBaru/{thn_masuk}', [Adminsiswacontroller::class, 'exportBaru_excel']);

//////////////////PDF//////////////////////////
Route::get('/page/siswa/siswamutasi/cetak_pdf', [SiswaController::class, 'cetak_pdf'])->name('cetak_pdf');