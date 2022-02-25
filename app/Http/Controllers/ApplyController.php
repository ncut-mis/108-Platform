<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApplyController extends Controller
{
    public function index()
    {
        $data = DB::table('sellers')->where('status',0)->get();
        $data2 = DB::table('members')->get();
        return view('seller_apply', ['apply' => $data],['member'=>$data2]);

    }
}
