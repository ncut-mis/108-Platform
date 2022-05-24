<?php

use App\Http\Controllers\MailController;
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

//新增平台使用者
Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home.index');
Route::post('/home', [\App\Http\Controllers\HomeController::class, 'store'])->name('home.store');

//商品類別維護
Route::get('/category_maintain', [\App\Http\Controllers\AdminHomeController::class,'category_maintain'])->name('adminhome.category_maintain');
//停用類別
Route::get('/disable/{id}', [\App\Http\Controllers\AdminHomeController::class,'disable_category'])->name('adminhome.disable_category');
//啟用類別
Route::get('/able/{id}', [\App\Http\Controllers\AdminHomeController::class,'able_category'])->name('adminhome.able_category');
Route::get('/categories', [\App\Http\Controllers\AdminHomeController::class,'update_category'])->name('adminhome.update_category');
Route::get('/category_item/{id}', [\App\Http\Controllers\AdminHomeController::class,'show'])->name('adminhome.show');

//品質檢測項目維護/
Route::get('/quality_items/{id}', [\App\Http\Controllers\AdminHomeController::class,'delete_item'])->name('adminhome.delete_item');
Route::get('/quality_items', [\App\Http\Controllers\AdminHomeController::class,'update_item'])->name('adminhome.update_item');


Route::get('/', [\App\Http\Controllers\AdminHomeController::class, 'index'])->name('adminhome.index');//平台管理者首頁
Route::get('/posts', [\App\Http\Controllers\PostController::class, 'index'])->name('posts.index');//公告管理頁面

Route::get('/apply', [\App\Http\Controllers\ApplyController::class, 'index'])->name('apply.index');//賣家申請管理頁面
Route::get('/apply/{member_id}/pass', [\App\Http\Controllers\ApplyController::class, 'pass'])->name('apply.pass');//通過賣家申請
Route::get('/apply/{member_id}/fail', [\App\Http\Controllers\ApplyController::class, 'fail'])->name('apply.fail');//不通過賣家申請

Route::get('/schedule', [\App\Http\Controllers\ScheduleController::class, 'index'])->name('schedule.index');//排班頁面
Route::get('/schedule/add/{id}', [\App\Http\Controllers\ScheduleController::class, 'add'])->name('schedule.add');//新增值班時段
Route::get('/schedule/remove/{id}', [\App\Http\Controllers\ScheduleController::class, 'remove'])->name('schedule.remove');//刪除值班時段
Route::get('/schedule/{staff}', [\App\Http\Controllers\ScheduleController::class, 'check'])->name('schedule.check');//查看檢測人員班表頁面
Route::get('/schedule_next', [\App\Http\Controllers\ScheduleController::class, 'next'])->name('schedule.next');//下個月排班頁面
Route::get('/schedule/next/build', [\App\Http\Controllers\ScheduleController::class, 'build'])->name('schedule.build');//建立空白班表
Route::get('/schedule/space/build', [\App\Http\Controllers\ScheduleController::class, 'addspace'])->name('schedule.addspace');//建立單一空間
Route::get('/schedule_t2', [\App\Http\Controllers\ScheduleController::class, 't2'])->name('schedule.test2');//test2_刪除工具
Route::get('/schedule/next/{staff}', [\App\Http\Controllers\ScheduleController::class, 'checknext'])->name('schedule.checknext');//查看下個月檢測人員班表頁面
Route::get('/schedule/add/next/{id}', [\App\Http\Controllers\ScheduleController::class, 'addnext'])->name('schedule.addnext');//新增下個月值班時段
Route::get('/schedule/remove/next/{id}', [\App\Http\Controllers\ScheduleController::class, 'removenext'])->name('schedule.removenext');//刪除下個月值班時段

Route::get('/staff', [\App\Http\Controllers\StaffController::class, 'index'])->name('staffhome.index');//平台人員首頁
Route::get('/staff/schedule', [\App\Http\Controllers\StaffController::class, 'check'])->name('staffschedule.index');//檢測人員查看班表
Route::get('/staff/schedule/{detail}', [\App\Http\Controllers\StaffController::class, 'detail'])->name('staffschedule.detail');//檢測人員查看班表詳細時段
Route::get('/staff/exams/{id}', [\App\Http\Controllers\ExamController::class, 'index'])->name('exams.index');//檢測人員進行檢測
Route::get('/exams/finish', [\App\Http\Controllers\ExamController::class, 'finish'])->name('exams.finish');//檢測人員結束檢測

//寄信功能
Route::get('/sendmail', [MailController::class, 'send'])->name('email');





Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

