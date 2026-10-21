<?php
namespace App\Services;
use App\Models\Manager;
use Illuminate\Support\Facades\DB;

class ManagerService {

public function creatManager(array $data){
    return DB::transaction(function () use($data){
        Manager::create($data);
    });

}

public function updateManager(Manager $manager , array $data){

    return DB::transaction(function() use($manager , $data){

        $manager->update($data);
        return $manager;

    });
}

}





?>
