<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    //

    public function index()
    {
        if(Auth::check())
        {
            //$staff = auth()->staff()->id;
            return view('adminhome');
        }
        else
        {
            return view('auth.login');
        }
    }
}
