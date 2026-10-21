<?php

namespace App\Services;
use App\Models\teacher;
use App\Traits\UploadImageTrait;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request ;

class TeacherService {
    use UploadImageTrait;

    public function createTeacher(array $data , Request $request){

        DB::beginTransaction();
        try{
            if($request->hasFile('img')){
                $data['img']=$this->uploadImage($request , 'img' , 'teachers');
            }
            $teacher=teacher::create($data);
            DB::commit();
            return $teacher;

        }catch(Exception $e){

            DB::rollBack();
            Log::error('Error creating teacher:' . $e->getMessage());
            throw new Exception('Error , try agen');
        }
    }


    public function updateTeacher(teacher $teacher , array $data , $request){

        DB::beginTransaction();

        try{
            if($request->hasFile('img')){
                $data['img']=$this->uploadImage($request , 'img' , 'teachers' , $teacher->img);
            }
            $teacher->update($data);

            DB::commit();
            return $teacher;

        }catch(Exception $e){
            DB::rollBack();
            Log::error('Error updating teacher:' . $e->getMessage() );
            throw new Exception('try agen');

        }
        // return DB::transaction(function() use($teacher , $data , $request){

        // if($request->hasFile('img')){
        //     $data['img'] = $this->uploadImage($request, 'img' , 'teachers' , $teacher->img);
        // }

        // $teacher->update($data);
        // return $teacher ;


        // });
    }


}















?>