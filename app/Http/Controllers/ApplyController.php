<?php

namespace App\Http\Controllers;

use App\Models\Seller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApplyController extends Controller
{
    public function index()
    {
        $apply = Seller::join('users','sellers.member_id','=','users.id')
                        ->where('status','=','0')
                        ->select('users.name','sellers.member_id','sellers.bank_branch','sellers.account')
                        ->get();
        return view('seller_apply', ['applies' => $apply]);

    }
    public function pass($member_id)
    {
        Seller::where('id','=',$member_id)->update(['status'=>'1']);
        return redirect()->route('apply.index');
    }
    public function fail($member_id)
    {
        Seller::destroy($member_id);
        return redirect()->route('apply.index');
    }
}
