<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\siswaController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\RombelController;
use App\Http\Controllers\AbsenController;
use App\Http\Controllers\NilaiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Data Siswa
Route::get('/siswa', [siswaController::class, 'index']);
Route::post('/siswa', [siswaController::class, 'store']);
Route::get('/siswa/{nik}', [siswaController::class, 'show']);
Route::put('/siswa/{nik}', [siswaController::class, 'update']);
Route::delete('/siswa/{nik}', [siswaController::class, 'destroy']);
// AKhir Data Siswa

// Data Jabatan
Route::get('/jabatan', [JabatanController::class, 'index']);
Route::post('/jabatan', [JabatanController::class, 'store']);
Route::get('/jabatan/{id_jabatan}', [JabatanController::class, 'show']);
Route::put('/jabatan/{id_jabatan}', [JabatanController::class, 'update']);
Route::delete('/jabatan/{id_jabatan}', [JabatanController::class, 'destroy']);
// Akhir Data Jabatan

// Data Guru
Route::get('/guru', [GuruController::class, 'index']);
Route::post('/guru', [GuruController::class, 'store']);
Route::get('/guru/{id_guru}', [GuruController::class, 'show']);
Route::put('/guru/{id_guru}', [GuruController::class, 'update']);
Route::delete('/guru/{id_guru}', [GuruController::class, 'destroy']);
// Akhir Data Guru

// Data Mapel
Route::get('/mapel', [MapelController::class, 'index']);
Route::post('/mapel', [MapelController::class, 'store']);
Route::get('/mapel/{id_mapel}', [MapelController::class, 'show']);
Route::put('/mapel/{id_mapel}', [MapelController::class, 'update']);
Route::delete('/mapel/{id_mapel}', [MapelController::class, 'destroy']);
// Akhir Data Mapel

// Data Kelas
Route::get('/kelas', [KelasController::class, 'index']);
Route::post('/kelas', [KelasController::class, 'store']);
Route::get('/kelas/{id_kelas}', [KelasController::class, 'show']);
Route::put('/kelas/{id_kelas}', [KelasController::class, 'update']);
Route::delete('/kelas/{id_kelas}', [KelasController::class, 'destroy']);
// Akhir Data Kelas

// Data rombel
Route::get('/rombel', [RombelController::class, 'index']);
Route::post('/rombel', [RombelController::class, 'store']);
Route::get('/rombel/{id_rombel}', [RombelController::class, 'show']);
Route::put('/rombel/{id_rombel}', [RombelController::class, 'update']);
Route::delete('/rombel/{id_rombel}', [RombelController::class, 'destroy']);
// Akhir Data Rombel

// Data Jadwal
Route::get('/jadwal', [JadwalController::class, 'index']);
Route::post('/jadwal', [JadwalController::class, 'store']);
Route::get('/jadwal/{id_jadwal}', [JadwalController::class, 'show']);
Route::put('/jadwal/{id_jadwal}', [JadwalController::class, 'update']);
Route::delete('/jadwal/{id_jadwal}', [JadwalController::class, 'destroy']);
// Akhir Data Jadwal

// Data Absen
Route::get('/absen', [AbsenController::class, 'index']);
Route::post('/absen', [AbsenController::class, 'store']);
Route::get('/absen/{id_absen}', [AbsenController::class, 'show']);
Route::put('/absen/{id_absen}', [AbsenController::class, 'update']);
Route::delete('/absen/{id_absen}', [AbsenController::class, 'destroy']);
// Akhir Data Absen

// Data Nilai
Route::get('/nilai', [NilaiController::class, 'index']);
Route::post('/nilai', [NilaiController::class, 'store']);
Route::get('/nilai/{id_nilai}', [NilaiController::class, 'show']);
Route::put('/nilai/{id_nilai}', [NilaiController::class, 'update']);
Route::delete('/nilai/{id_nilai}', [NilaiController::class, 'destroy']);
// Akhir Data Nilai
