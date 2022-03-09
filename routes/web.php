<?php

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


Route::get('/', [\App\Http\Controllers\AdminHomeController::class, 'index'])->name('adminhome.index');//平台人員首頁
Route::get('/posts', [\App\Http\Controllers\PostController::class, 'index'])->name('posts.index');//公告管理頁面
Route::get('/apply', [\App\Http\Controllers\ApplyController::class, 'index'])->name('apply.index');//賣家申請管理頁面
Route::get('/schedule', [\App\Http\Controllers\StaffController::class, 'index'])->name('staff.schedule');//排班頁面
Route::get('/schedule_in/{id}', [\App\Http\Controllers\StaffController::class, 'add'])->name('staff.add');//新增排班
Route::get('/schedule_ed/{id}', [\App\Http\Controllers\StaffController::class, 'edit'])->name('staff.edit');//修改排班
Route::get('/s1', [\App\Http\Controllers\StaffController::class, 'check'])->name('staff.check');//檢測人員查看班表頁面
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::get('/reg', function () {
    return view('register');
});
