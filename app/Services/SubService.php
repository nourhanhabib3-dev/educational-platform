<?php
namespace App\Services;
use App\Models\Sub;
use Illuminate\Support\Facades\DB;

class SubService {

    public function getAllSubs(){
        return Sub::with('year')->get();


    }


    public function createSub(array $data ){
        return DB::transaction(function () use($data){

            $sub= Sub::create($data);
            $sub->load('year');
            return $sub ;

        });
    }


    public function updateSub( Sub $sub , array $data ){
       return DB::transaction(function() use($sub , $data){
            $sub->update($data);
            return $sub ;
        });
    }
}









?>
