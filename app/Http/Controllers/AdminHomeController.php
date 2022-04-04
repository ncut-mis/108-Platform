<?php

namespace App\Http\Controllers;

use App\Models\PerWeekSchedule;
use App\Models\Seller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminHomeController extends Controller
{
    public function index()
    {
        if(\Illuminate\Support\Facades\Auth::check())
        {
            $month = date("n");
            session_start();
            //$data = DB::table('sellers')->where('status',0)->get();
            $data = Seller::where('status',0)->get();
            //$data2=DB::table('per_week_schedules')->where('month',$month)->where('staff_id',null)->get();
            $data2 = PerWeekSchedule::where('month',$month)->where('staff_id',null)->get();
            $_SESSION['apply_status']=$data;
            $_SESSION['schedule_status']=$data2;
            $t2 = PerWeekSchedule::where('month',$month-1)->delete();//自動刪除前一個月的班表
            if(auth()->user()->job=='管理者')
            {
                return view('adminhome');
            }
            else
            {
                return view('staffhome');
            }
        }
        else
        {
            return redirect()->route('login');

        }
    }

}
