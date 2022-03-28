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


Route::get('/', [\App\Http\Controllers\AdminHomeController::class, 'index'])->name('adminhome.index');//平台管理者首頁
Route::get('/posts', [\App\Http\Controllers\PostController::class, 'index'])->name('posts.index');//公告管理頁面

Route::get('/apply', [\App\Http\Controllers\ApplyController::class, 'index'])->name('apply.index');//賣家申請管理頁面
Route::get('/apply/{apply}/pass', [\App\Http\Controllers\ApplyController::class, 'pass'])->name('apply.pass');//通過賣家申請
Route::get('/apply/{apply}/fail', [\App\Http\Controllers\ApplyController::class, 'fail'])->name('apply.fail');//不通過賣家申請

Route::get('/schedule', [\App\Http\Controllers\ScheduleController::class, 'index'])->name('staff.schedule');//排班頁面
Route::get('/schedule/add/{id}', [\App\Http\Controllers\ScheduleController::class, 'add'])->name('schedule.add');//新增值班時段
Route::get('/schedule/remove/{id}', [\App\Http\Controllers\ScheduleController::class, 'remove'])->name('schedule.remove');//刪除值班時段
Route::get('/schedule/{staff}', [\App\Http\Controllers\ScheduleController::class, 'check'])->name('schedule.check');//查看檢測人員班表頁面
Route::get('/schedule_next', [\App\Http\Controllers\ScheduleController::class, 'next'])->name('schedule.next');//下個月排班頁面
Route::get('/schedule_test', [\App\Http\Controllers\ScheduleController::class, 'neschedule'])->name('schedule.build');//建立空白班表
Route::get('/schedule_t2', [\App\Http\Controllers\ScheduleController::class, 't2'])->name('schedule.test2');//test2_刪除工具
Route::get('/schedule/next/{staff}', [\App\Http\Controllers\ScheduleController::class, 'checknext'])->name('schedule.checknext');//查看下個月檢測人員班表頁面
Route::get('/schedule/add/next/{id}', [\App\Http\Controllers\ScheduleController::class, 'addnext'])->name('schedule.addnext');//新增下個月值班時段
Route::get('/schedule/remove/next/{id}', [\App\Http\Controllers\ScheduleController::class, 'removenext'])->name('schedule.removenext');//刪除下個月值班時段

Route::get('/staff', [\App\Http\Controllers\StaffController::class, 'index'])->name('staffhome.index');//平台人員首頁
Route::get('/staff/schedule', [\App\Http\Controllers\StaffController::class, 'check'])->name('staffschedule.index');//檢測人員查看班表





//Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//    return view('dashboard');
//})->name('dashboard');
