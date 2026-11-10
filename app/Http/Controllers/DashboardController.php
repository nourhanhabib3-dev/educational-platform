<?php

namespace App\Http\Controllers;
use App\Services\DashboardService;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{

    public function __construct(protected DashboardService $dashboard_service){}


    public function index(){

        if(Auth::guard('manage')->check()){
           $stats = $this->dashboard_service->managerStats();
        }elseif(Auth::guard('tech')->check()){
            $stats = $this->dashboard_service->teacherStats(Auth::guard('tech')->user()->id);
        }else{
            abort(403);
        }

        return view('dashboard.pages.index' , compact('stats'));


    }
}
