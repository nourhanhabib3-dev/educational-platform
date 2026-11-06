<?php

namespace App\Http\Controllers;

use App\Http\Requests\ManaegeAuth;
use App\Services\ManagerAuthService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class ManagerAuthController extends Controller
{
    public function __construct(protected ManagerAuthService $managerAuth){}

    public function show_form(){
        return view('dashboard.auth.login');
    }

    public function check_form(ManaegeAuth $request){

        $data=$request->only('email' , 'password');

        if($this->managerAuth->checkDataMan($data)){
            // exist to old session after that the num new session use->regenerate()
            $request->session()->regenerate();
            return to_route('index');

        }elseif( $this->managerAuth->checkDataTech($data)){
            $request->session()->regenerate();
            return to_route('index2');

        }else{
            return to_route('login_form')->withErrors([
                'email'=>'email or password are not corect'
            ]);
        }
    }

    public function logout(){
       $this->managerAuth->logout();
       return to_route('login_form');

    }
}
