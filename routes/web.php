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
Route::get('/schedule', [\App\Http\Controllers\ScheduleController::class, 'index'])->name('staff.schedule');//排班頁面
Route::get('/schedule_in/{id}', [\App\Http\Controllers\ScheduleController::class, 'add'])->name('schedule.add');//新增值班時段
Route::get('/schedule_re/{id}', [\App\Http\Controllers\ScheduleController::class, 'remove'])->name('schedule.remove');//刪除值班時段
Route::get('/schedule/{staff}', [\App\Http\Controllers\ScheduleController::class, 'check'])->name('schedule.check');//查看檢測人員班表頁面
Route::get('/schedule_next', [\App\Http\Controllers\ScheduleController::class, 'next'])->name('schedule.next');//下個月排班頁面
Route::get('/schedule_test', [\App\Http\Controllers\ScheduleController::class, 'neschedule'])->name('schedule.test');//test
Route::get('/schedule_t2', [\App\Http\Controllers\ScheduleController::class, 't2'])->name('schedule.test2');//test2



Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::get('/reg', function () {
    return view('register');
});
Route::get('/log', function () {
    return view('login');
});
