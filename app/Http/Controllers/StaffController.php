<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StaffController extends Controller
{
    public function index()
    {
        return view('staffhome');
    }
    public function check()
    {
        $month = date("n");
        $data1_1 = DB::table('per_week_schedules')->where('week','一')->where('start','09:00:00')->where('month',$month)->get();
        $data1_2 = DB::table('per_week_schedules')->where('week','一')->where('start','15:00:00')->where('month',$month)->get();
        $data1_3 = DB::table('per_week_schedules')->where('week','一')->where('start','18:00:00')->where('month',$month)->get();

        $data2_1 = DB::table('per_week_schedules')->where('week','二')->where('start','09:00:00')->where('month',$month)->get();
        $data2_2 = DB::table('per_week_schedules')->where('week','二')->where('start','15:00:00')->where('month',$month)->get();
        $data2_3 = DB::table('per_week_schedules')->where('week','二')->where('start','18:00:00')->where('month',$month)->get();

        $data3_1 = DB::table('per_week_schedules')->where('week','三')->where('start','09:00:00')->where('month',$month)->get();
        $data3_2 = DB::table('per_week_schedules')->where('week','三')->where('start','15:00:00')->where('month',$month)->get();
        $data3_3 = DB::table('per_week_schedules')->where('week','三')->where('start','18:00:00')->where('month',$month)->get();

        $data4_1 = DB::table('per_week_schedules')->where('week','四')->where('start','09:00:00')->where('month',$month)->get();
        $data4_2 = DB::table('per_week_schedules')->where('week','四')->where('start','15:00:00')->where('month',$month)->get();
        $data4_3 = DB::table('per_week_schedules')->where('week','四')->where('start','18:00:00')->where('month',$month)->get();

        $data5_1 = DB::table('per_week_schedules')->where('week','五')->where('start','09:00:00')->where('month',$month)->get();
        $data5_2 = DB::table('per_week_schedules')->where('week','五')->where('start','15:00:00')->where('month',$month)->get();
        $data5_3 = DB::table('per_week_schedules')->where('week','五')->where('start','18:00:00')->where('month',$month)->get();

        $data6_1 = DB::table('per_week_schedules')->where('week','六')->where('start','09:00:00')->where('month',$month)->get();
        $data6_2 = DB::table('per_week_schedules')->where('week','六')->where('start','15:00:00')->where('month',$month)->get();
        $data6_3 = DB::table('per_week_schedules')->where('week','六')->where('start','18:00:00')->where('month',$month)->get();

        $data7_1 = DB::table('per_week_schedules')->where('week','日')->where('start','09:00:00')->where('month',$month)->get();
        $data7_2 = DB::table('per_week_schedules')->where('week','日')->where('start','15:00:00')->where('month',$month)->get();
        $data7_3 = DB::table('per_week_schedules')->where('week','日')->where('start','18:00:00')->where('month',$month)->get();
        $staff=DB::table('staff')->get();
        session_start();
        $_SESSION['open']=0;
        $_SESSION['w1_1']=$data1_1;
        $_SESSION['w1_2']=$data1_2;
        $_SESSION['w1_3']=$data1_3;

        $_SESSION['w2_1']=$data2_1;
        $_SESSION['w2_2']=$data2_2;
        $_SESSION['w2_3']=$data2_3;

        $_SESSION['w3_1']=$data3_1;
        $_SESSION['w3_2']=$data3_2;
        $_SESSION['w3_3']=$data3_3;

        $_SESSION['w4_1']=$data4_1;
        $_SESSION['w4_2']=$data4_2;
        $_SESSION['w4_3']=$data4_3;

        $_SESSION['w5_1']=$data5_1;
        $_SESSION['w5_2']=$data5_2;
        $_SESSION['w5_3']=$data5_3;

        $_SESSION['w6_1']=$data6_1;
        $_SESSION['w6_2']=$data6_2;
        $_SESSION['w6_3']=$data6_3;

        $_SESSION['w7_1']=$data7_1;
        $_SESSION['w7_2']=$data7_2;
        $_SESSION['w7_3']=$data7_3;


        return view('staff_checkschedule');
    }
}
