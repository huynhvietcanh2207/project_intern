<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ThietLap\NhomDoiTuongController;
use App\Http\Controllers\ThietLap\ThietLapController;
use App\Http\Controllers\ThietLap\NhaCungCapController;
use App\Http\Controllers\ThietLap\HangHoaController;
use App\Http\Controllers\ThietLap\NhanVienController;
use App\Http\Controllers\ThietLap\KhoController;

use App\Http\Controllers\NghiepVu\PhieuNhapHangController;
use App\Http\Controllers\NghiepVu\PhieuXuatHangController;
use App\Http\Controllers\NghiepVu\TraCuuTonKhoController;
use App\Http\Controllers\NghiepVu\TraCuuBaoHanhController;
use App\Http\Controllers\NghiepVu\PhieuTiepNhanController;
use App\Http\Controllers\NghiepVu\PhieuTraHangController;
use App\Http\Controllers\NghiepVu\PhieuBaoGiaController;




use App\Http\Controllers\BaoCao\TongQuatBaoCaoController;
use App\Http\Controllers\BaoCao\BaoCaoHangXuatNhapController;
use App\Http\Controllers\BaoCao\BaoCaoHangTiepNhanTraHangController;
use App\Http\Controllers\BaoCao\PhieuBaoCaoGiaController;


use App\Http\Controllers\BaoCaoController;
use App\Http\Controllers\NghiepVuController;
use App\Http\Controllers\adminController;

use App\Http\Controllers\ThietLap\KhachHangController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('admin');
});

Route::resource('nhomdoituong', NhomDoiTuongController::class);
Route::resource('khachhang', KhachHangController::class);
Route::resource('nhacungcap', NhaCungCapController::class);
Route::resource('hanghoa', HangHoaController::class);
Route::resource('nhanvien', NhanVienController::class);
Route::resource('kho', KhoController::class);

/*NghiepVu*/
Route::resource('phieunhaphang', PhieuNhapHangController::class);
Route::resource('phieuxuathang', PhieuXuatHangController::class);
Route::resource('tracuutonkho', TraCuuTonKhoController::class);
Route::resource('tracuubaohanh', TraCuuBaoHanhController::class);
Route::resource('phieutiepnhan', PhieuTiepNhanController::class);
Route::resource('phieutrahang', PhieuTraHangController::class);
Route::resource('phieubaogia', PhieuBaoGiaController::class);


Route::resource('tongquatbaocao', TongQuatBaoCaoController::class);
Route::resource('baocaohangxuatnhap', BaoCaoHangXuatNhapController::class);
Route::resource('baocaohangtiepnhantrahang', BaoCaoHangTiepNhanTraHangController::class);
Route::resource('baocaophieubaogia', PhieuBaoCaoGiaController::class);

Route::resource('/nghiepvu', NghiepVuController::class);
Route::resource('/thietlap', ThietLapController::class);
Route::resource('/baocao', BaoCaoController::class);
Route::resource('/admin', adminController::class);

// Route::resources([
//   'nhomdoituong', NhomDoiTuongController::class,
//   'khachhang', KhachHangController::class

// ]);