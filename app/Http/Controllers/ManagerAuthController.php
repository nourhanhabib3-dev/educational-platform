<?php

namespace App\Http\Controllers;

use App\Http\Requests\ManaegeAuth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ManagerAuthController extends Controller
{
    public function show_form(){
        return view('dashboard.auth.login');
    }

    public function check_form(ManaegeAuth $request){

        if(Auth::guard('manage')->attempt($request->except('_token'))){
            return to_route('index');
        }else{
            return to_route('login_form');
        }
    }

    public function logout(){
        Auth::guard('manage')->logout();
        return to_route('login_form');
    }
}
