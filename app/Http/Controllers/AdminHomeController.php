<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminHomeController extends Controller
{
    public function index()
    {
        session_start();
        $data = DB::table('sellers')->where('status',0)->get();
        $_SESSION['apply_status']=$data;
        return view('adminhome');
    }
}
