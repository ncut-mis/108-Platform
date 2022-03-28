<?php

namespace App\Http\Controllers;

use App\Models\Seller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApplyController extends Controller
{
    public function index()
    {
        $data = DB::table('sellers')->where('status',0)->get();//申請為賣家的人
        $data2 = DB::table('members')->get();
        return view('seller_apply', ['apply' => $data],['member'=>$data2]);

    }
    public function pass($apply)
    {
        DB::table('sellers')->where('id',$apply)->update(
            [



                'status'=>1


            ]
        );
        return redirect()->route('apply.index');
    }
    public function fail($apply)
    {
        Seller::destroy($apply);
        return redirect()->route('apply.index');
    }
}
