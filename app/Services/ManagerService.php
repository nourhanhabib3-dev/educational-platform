<?php
namespace App\Services;
use App\Models\Manager;
use App\Traits\UploadImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ManagerService {
    use UploadImageTrait ;

public function creatManager(array $data , Request $request){
    return DB::transaction(function () use($data , $request){

        $data['img']=$this->uploadFile($request , 'img' , 'managers');

        Manager::create($data);
    });

}

public function updateManager(Manager $manager , array $data , Request $request){

    return DB::transaction(function() use($manager , $data , $request){
        $data['img']=$this->uploadFile($request , 'img' , 'managers' , $manager->img);
        $manager->update($data);
        return $manager;

    });
}

}





?>