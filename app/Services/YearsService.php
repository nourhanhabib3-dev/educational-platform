<?php
namespace App\Services;
use App\Models\Year;
use Illuminate\Support\Facades\DB;

class YearsService {

  public function getAllYears(){
        return Year::all();
    }

    public function createYear(array $data){
        return DB::transaction(function () use($data) {
           return Year::create($data);
        });

    }

    public function updateYear(Year $year , array $data){
        return DB::transaction(function($year , $data){
            $year->update($data);
            return $year ;
        });
    }



}









?>
