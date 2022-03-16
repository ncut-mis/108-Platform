<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminHomeController extends Controller
{
    public function index()
    {
        $month = date("n");
        session_start();
        $data = DB::table('sellers')->where('status',0)->get();
        $data2=DB::table('per_week_schedules')->where('month',$month)->where('staff_id',null)->get();
        $_SESSION['apply_status']=$data;
        $_SESSION['schedule_status']=$data2;

        return view('adminhome');
    }
}
