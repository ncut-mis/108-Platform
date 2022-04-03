<?php

namespace App\Http\Controllers;

use App\Actions\Fortify\PasswordValidationRules;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    //

    public function index()
    {
        /*if (Auth::check()) {
            //$staff = auth()->staff()->id;
            return view('adminhome');
        } else {
            return view('auth.login');
        }*/
        return view('reg');
    }

    use PasswordValidationRules;

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|max:255',
            'password' => $this->passwordRules(),
            'job' => 'required|max:255',
        ]);

        $request->user()->create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request['password']),
            'job' => $request->job,
        ]);

        return redirect()->route('adminhome.index');
    }

}
