<?php
use App\Http\Controllers\AdminController;

use Illuminate\Support\Facades\Route;


Route::get('/admin/login', [AdminController::class, 'viewLogin']);
Route::post('/admin/login', [AdminController::class, 'actionLogin']);
Route::group(['prefix' => '/admin', 'middleware' => 'loginAdmin'],function() {
    Route::get('/', [AdminController::class, 'viewHome']);

    Route::group(['prefix' => '/cau-hinh'], function() {
        Route::get('/index', [ConfigController::class, 'index']);
        Route::post('/index', [ConfigController::class, 'store']);
    });
    Route::group(['prefix' => '/phong'], function() {
        Route::get('/index', [PhongController::class, 'index']);
        Route::get('/data', [PhongController::class, 'getData']);
        Route::post('/index', [PhongController::class, 'store']);
        Route::post('/update', [PhongController::class, 'update']);

        Route::get('/change-status/{id}', [PhongController::class, 'changeStatus']);
        Route::get('/delete/{id}', [PhongController::class, 'destroy']);
        Route::get('/edit/{id}', [PhongController::class, 'edit']);

        Route::get('/data-ghe/{id_phong}', [PhongController::class, 'getDataGhe']);
    });

    Route::group(['prefix' => '/phim'], function() {
        Route::get('/index', [PhimController::class, 'index']);
        Route::post('/create', [PhimController::class, 'store']);
        Route::get('/data' , [PhimController::class, 'getData']);

        Route::get('/index-vue', [PhimController::class, 'indexVue']);
        Route::post('/index-vue', [PhimController::class, 'storeVue']);

        Route::post('/delete', [PhimController::class, 'destroy']);
        Route::post('/update', [PhimController::class, 'update']);
    });

    Route::group(['prefix' => '/lich-chieu'], function() {
        Route::get('/index', [LichChieuController::class, 'index'])->name('tao_nhieu_buoi');
        Route::post('/index', [LichChieuController::class, 'store']);

        Route::get('/data', [LichChieuController::class, 'getData']);

        Route::get('/thoi-khoa-bieu', [LichChieuController::class, 'viewThoiKhoaBieu']);
        Route::get('/data-thoi-khoa-bieu', [LichChieuController::class, 'dataThoiKhoaBieu']);

        Route::get('/tao-mot-buoi', [LichChieuController::class, 'viewTaoMotBuoi'])->name('tao_mot_buoi');
        Route::post('/tao-mot-buoi', [LichChieuController::class, 'actionTaoMotBuoi']);

        Route::post('/xoa-lich', [LichChieuController::class, 'destroy']);

        Route::get('/danh-sach-ghe/{id_lich}', [GheBanController::class, 'getData']);
        Route::post('/danh-sach-ghe/doi-trang-thai', [GheBanController::class, 'doiTrangThaiGheBan']);
    });

    Route::group(['prefix' => '/tai-khoan'], function() {
        Route::get('/index', [AdminController::class, 'index']);
        Route::get('/index/data', [AdminController::class, 'getData']);
        Route::post('/create', [AdminController::class, 'store']);
    });

    Route::group(['prefix' => '/bai-viet'], function() {
        Route::get('/index', [QuanLyBaiVietController::class, 'index']);
        Route::post('/create', [QuanLyBaiVietController::class, 'createBaiViet']);
        Route::post('/update', [QuanLyBaiVietController::class, 'updateBaiViet']);
        Route::get('/data', [QuanLyBaiVietController::class, 'getData']);
        Route::get('/status/{id}', [QuanLyBaiVietController::class, 'doiTrangThai']);
        Route::post('/delete', [QuanLyBaiVietController::class, 'delete']);
    });
});

Route::get('/update-password/{hash}', [CustomerController::class, 'viewUpdatePassword']);
Route::post('/update-password', [CustomerController::class, 'actionUpdatePassword']);

Route::get('/reset-password', [CustomerController::class, 'viewResetPassword']);
Route::post('/reset-password', [CustomerController::class, 'actionResetPassword']);

Route::get('/login', [CustomerController::class, 'viewLogin']);
Route::post('/login', [CustomerController::class, 'actionLogin']);

Route::get('/register', [CustomerController::class, 'viewRegister']);
Route::post('/register', [CustomerController::class, 'actionRegister']);

Route::get('/logout', [CustomerController::class, 'actionLogout']);

Route::get('/active/{hash}', [CustomerController::class, 'actionActive']);
Route::get('/data', [CustomerController::class, 'getData']);
Route::post('/update', [CustomerController::class, 'update']);
Route::post('/delete', [CustomerController::class, 'destroy']);
Route::get('/change-status/{id}', [CustomerController::class, 'changeStatus']);
Route::get('/kich-hoat/{id}', [CustomerController::class, 'kichHoat']);