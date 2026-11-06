<?php

namespace App\Services;

use App\Http\Requests\StoreLessonRequest;
use App\Models\Course;
use App\Models\Lesson;
use App\Traits\UploadImageTrait;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Override;

class LessonService {

    use UploadImageTrait ;

    public function getAllLesson(){
        if(Auth::guard('manage')->check()){
            return Lesson::with('course')->get();

        }elseif(Auth::guard('tech')->check()){
            $teacher_id = Auth::guard('tech')->user()->id;

            return Lesson::whereHas('course' , function($query) use ($teacher_id){
                $query->where('teacher_id' , $teacher_id);
            })->get();


        }
        return collect();

    }

    public function storeLesson(Array $data , StoreLessonRequest $request , Course $course){
        DB::beginTransaction();
        try{
            $data['video']=$this->uploadFile($request , 'video' , 'lessonVideo' );
            $lesson = $course->lessons()->create($data);
             DB::commit();
            return $lesson ;
        }catch(Exception $e){
            DB::rollBack();
            Log::error("erorr: " . $e->getMessage() );
            throw new Exception('try again');


        }

    }

    public function deleteLesson(Lesson $lesson ){
        DB::beginTransaction();
        try{
            $video = $lesson->video ;
            $lesson->delete();
            DB::commit();
            $this->deleteFile($video);

        }catch(Exception $e){
            DB::rollBack();
            Log::error('erorr: ' .$e->getMessage());
            throw new Exception('try again');

        }
    }
}










?>