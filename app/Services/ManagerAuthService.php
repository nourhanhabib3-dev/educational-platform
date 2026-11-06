<?php
namespace App\Services;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ManagerAuthService{

   public function checkDataMan(array $data){
        return Auth::guard('manage')->attempt($data);
   }

   public function checkDataTech(array $data){
        return Auth::guard('tech')->attempt($data);
   }


   public function logout(){
       Auth::guard('manage')->logout();
       Auth::guard('tech')->logout();
   }


}





?>
