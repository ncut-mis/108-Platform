<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StaffController extends Controller
{
    public function index()
    {
        $data = DB::table('per_week_schedules')->where('week','一')->get();
        $data2 = DB::table('per_week_schedules')->where('week','二')->get();
        $data3 = DB::table('per_week_schedules')->where('week','三')->get();
        $data4 = DB::table('per_week_schedules')->where('week','四')->get();
        $data5 = DB::table('per_week_schedules')->where('week','五')->get();
        $data6 = DB::table('per_week_schedules')->where('week','六')->get();
        $data7 = DB::table('per_week_schedules')->where('week','日')->get();
        $staff=DB::table('staff')->get();
        session_start();
        $_SESSION['w2']=$data2;
        $_SESSION['w3']=$data3;
        $_SESSION['w3']=$data3;
        $_SESSION['w4']=$data4;
        $_SESSION['w5']=$data5;
        $_SESSION['w6']=$data6;
        $_SESSION['w7']=$data7;
        $_SESSION['open']=0;
        return view('schedule',['w1' => $data],['staff' => $staff]);

    }
    public function add($id)
    {
        $data = DB::table('per_week_schedules')->where('id',$id)->get();
        return view('schedule_insert',['add'=>$data]);
    }
}
