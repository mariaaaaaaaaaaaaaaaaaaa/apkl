<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SLBController;
use App\Http\Controllers\SMAController;
use App\Http\Controllers\SMKController;
// use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;

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
    return view('auth.login');
});
Route::get('/welcome', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth','user-role:0'])->group(function(){
  
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

    Route::get('/admin/prestasi', [AdminController::class, 'indexAchievements'])->name('admin.achievements');
    Route::get('/admin/prestasi/pdf', [AdminController::class, 'pdfAchievements'])->name('admin.achievements.pdf');
    Route::get('/admin/prestasi/excel', [AdminController::class, 'excelAchievements'])->name('admin.achievements.excel');

    Route::get('/admin/prestasi/sma', [AdminController::class, 'indexAchievementsSMA'])->name('admin.achievements.sma');
    Route::get('/admin/prestasi/sma/pdf', [AdminController::class, 'pdfAchievementsSMA'])->name('admin.achievements.sma.pdf');
    Route::get('/admin/prestasi/sma/excel', [AdminController::class, 'excelAchievementsSMA'])->name('admin.achievements.sma.excel');

    Route::get('/admin/prestasi/smk', [AdminController::class, 'indexAchievementsSMK'])->name('admin.achievements.smk');
    Route::get('/admin/prestasi/smk/pdf', [AdminController::class, 'pdfAchievementsSMK'])->name('admin.achievements.smk.pdf');
    Route::get('/admin/prestasi/smk/excel', [AdminController::class, 'excelAchievementsSMK'])->name('admin.achievements.smk.excel');

    Route::get('/admin/prestasi/slb', [AdminController::class, 'indexAchievementsSLB'])->name('admin.achievements.slb');
    Route::get('/admin/prestasi/slb/pdf', [AdminController::class, 'pdfAchievementsSLB'])->name('admin.achievements.slb.pdf');
    Route::get('/admin/prestasi/slb/excel', [AdminController::class, 'excelAchievementsSLB'])->name('admin.achievements.slb.excel');

    Route::get('/admin/akun_pengguna', [AdminController::class, 'indexUsers'])->name('admin.users');
    Route::get('/admin/akun_pengguna/admin', [AdminController::class, 'indexUsersAdmin'])->name('admin.users.admin');
    Route::get('/admin/akun_pengguna/admin/create', [AdminController::class, 'createAdmin'])->name('admin.users.admin.create');
    Route::post('/admin/akun_pengguna/admin/store', [AdminController::class, 'storeAdmin'])->name('admin.users.store');
    Route::get('/admin/akun_pengguna/admin/edit/{id}', [AdminController::class, 'editAdmin'])->name('admin.users.edit');
    Route::put('/admin/akun_pengguna/admin/update', [AdminController::class, 'updateAdmin'])->name('admin.users.update');
    Route::delete('/admin/akun_pengguna/admin/delete/{id}',[AdminController::class, 'destroy'])->name('admin.users.destroy');
    Route::get('/admin/akun_pengguna/pdf', [AdminController::class, 'pdfUsers'])->name('admin.users.pdf');
    Route::get('/admin/akun_pengguna/admin/pdf', [AdminController::class, 'pdfAdmin'])->name('admin.users.admin.pdf');
    Route::get('/admin/akun_pengguna/reset', [AdminController::class, 'reset'])->name('admin.users.reset');

    Route::get('/admin/akun_pengguna/sma', [AdminController::class, 'indexUsersSMA'])->name('admin.users.sma');
    Route::get('/admin/akun_pengguna/sma/create', [AdminController::class, 'createSMA'])->name('admin.users.sma.create');
    Route::post('/admin/akun_pengguna/sma/store', [AdminController::class, 'storeSMA'])->name('admin.users.sma.store');
    Route::get('/admin/akun_pengguna/sma/pdf', [AdminController::class, 'pdfSMA'])->name('admin.users.sma.pdf');
    Route::get('/admin/akun_pengguna/sma/edit/{id}', [AdminController::class, 'editSMA'])->name('admin.users.sma.edit');
    Route::put('/admin/akun_pengguna/sma/update', [AdminController::class, 'updateSMA'])->name('admin.users.sma.update');

    Route::get('/admin/akun_pengguna/smk', [AdminController::class, 'indexUsersSMK'])->name('admin.users.smk');
    Route::get('/admin/akun_pengguna/smk/create', [AdminController::class, 'createSMK'])->name('admin.users.smk.create');
    Route::post('/admin/akun_pengguna/smk/store', [AdminController::class, 'storeSMK'])->name('admin.users.smk.store');
    Route::get('/admin/akun_pengguna/smk/pdf', [AdminController::class, 'pdfSMK'])->name('admin.users.smk.pdf');
    Route::get('/admin/akun_pengguna/smk/edit/{id}', [AdminController::class, 'editSMK'])->name('admin.users.smk.edit');
    Route::put('/admin/akun_pengguna/smk/update', [AdminController::class, 'updateSMK'])->name('admin.users.smk.update');

    Route::get('/admin/akun_pengguna/slb', [AdminController::class, 'indexUsersSLB'])->name('admin.users.slb');
    Route::get('/admin/akun_pengguna/slb/create', [AdminController::class, 'createSLB'])->name('admin.users.slb.create');
    Route::post('/admin/akun_pengguna/slb/store', [AdminController::class, 'storeSLB'])->name('admin.users.slb.store');
    Route::get('/admin/akun_pengguna/slb/pdf', [AdminController::class, 'pdfSLB'])->name('admin.users.slb.pdf');
    Route::get('/admin/akun_pengguna/slb/edit/{id}', [AdminController::class, 'editSLB'])->name('admin.users.slb.edit');
    Route::put('/admin/akun_pengguna/slb/update', [AdminController::class, 'updateSLB'])->name('admin.users.slb.update');
    
    Route::get('/admin/profile', [ProfileController::class, 'admin'])->name('admin.profile');

});

/*
|--------------------------------------------------------------------------
| School Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth','user-role:1'])->group(function(){
  
    Route::get('/sma/dashboard', [SMAController::class, 'index'])->name('aschool.dashboard');
    Route::get('/sma/prestasi', [SMAController::class, 'show'])->name('aschool.achievements');
    Route::get('/sma/prestasi/create', [SMAController::class, 'create'])->name('aschool.achievements.create');
    Route::post('/sma/prestasi/store', [SMAController::class, 'store'])->name('aschool.achievements.store');
    Route::get('/sma/prestasi/edit/{id}', [SMAController::class, 'edit'])->name('aschool.achievements.edit');
    Route::put('/sma/prestasi/update', [SMAController::class, 'update'])->name('aschool.achievements.update');
    Route::delete('/sma/prestasi/delete/{id}',[SMAController::class, 'destroy'])->name('aschool.achievements.destroy');
    Route::get('/sma/prestasi/pdf', [SMAController::class, 'pdf'])->name('aschool.achievements.pdf');
    Route::get('/sma/prestasi/excel', [SMAController::class, 'excel'])->name('aschool.achievements.excel');
    Route::get('/sma/profile', [ProfileController::class, 'sma'])->name('aschool.profile');

});

Route::middleware(['auth','user-role:2'])->group(function(){
  
    Route::get('/smk/dashboard', [SMKController::class, 'index'])->name('kschool.dashboard');
    Route::get('/smk/prestasi', [SMKController::class, 'show'])->name('kschool.achievements');
    Route::get('/smk/prestasi/create', [SMKController::class, 'create'])->name('kschool.achievements.create');
    Route::post('/smk/prestasi/store', [SMKController::class, 'store'])->name('kschool.achievements.store');
    Route::get('/smk/prestasi/edit/{id}', [SMKController::class, 'edit'])->name('kschool.achievements.edit');
    Route::put('/smk/prestasi/update', [SMKController::class, 'update'])->name('kschool.achievements.update');
    Route::delete('/smk/prestasi/delete/{id}',[SMKController::class, 'destroy'])->name('kschool.achievements.destroy');
    Route::get('/smk/prestasi/pdf', [SMKController::class, 'pdf'])->name('kschool.achievements.pdf');
    Route::get('/smk/prestasi/excel', [SMKController::class, 'excel'])->name('kschool.achievements.excel');
    Route::get('/smk/profile', [ProfileController::class, 'smk'])->name('kschool.profile');

});

Route::middleware(['auth','user-role:3'])->group(function(){
  
    Route::get('/slb/dashboard', [SLBController::class, 'index'])->name('bschool.dashboard');
    Route::get('/slb/prestasi', [SLBController::class, 'show'])->name('bschool.achievements');
    Route::get('/slb/prestasi/create', [SLBController::class, 'create'])->name('bschool.achievements.create');
    Route::post('/slb/prestasi/store', [SLBController::class, 'store'])->name('bschool.achievements.store');
    Route::get('/slb/prestasi/edit/{id}', [SLBController::class, 'edit'])->name('bschool.achievements.edit');
    Route::put('/slb/prestasi/update', [SLBController::class, 'update'])->name('bschool.achievements.update');
    Route::delete('/slb/prestasi/delete/{id}',[SLBController::class, 'destroy'])->name('bschool.achievements.destroy');
    Route::get('/slb/prestasi/pdf', [SLBController::class, 'pdf'])->name('bschool.achievements.pdf');
    Route::get('/slb/prestasi/excel', [SLBController::class, 'excel'])->name('bschool.achievements.excel');
    Route::get('/slb/profile', [ProfileController::class, 'slb'])->name('bschool.profile');

});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
