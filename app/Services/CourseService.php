<?php
namespace App\Services;
use App\Models\Course;
use App\Traits\UploadImageTrait;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;



class CourseService {
    use UploadImageTrait ;

    public function getAllCourses(){
        if(Auth::guard('manage')->check()){
           return Course::withCount('lessons')->get();
        }elseif(Auth::guard('tech')->check()){
            $teacherId=Auth::guard('tech')->user()->id;
           return Course::withCount('lessons')->where('teacher_id' , $teacherId)->get();
        }else{
           return collect();
        }
    }

    public function createCourse(array $data , Request $request){
        DB::beginTransaction();
        try{

            $data['img']=$this->uploadFile($request , 'img' , 'courses');

            $data['teacher_id']=Auth::guard('tech')->user()->id;
            $course=Course::create($data);
            DB::commit();
            return $course ;

        }catch(Exception $e){
            DB::rollBack();
            Log::error('error creating course: ' . $e->getMessage() );
            throw new Exception('try again');


        }


    }

    public function updataCourse(  array $data , Request $request , Course $course,){
        DB::beginTransaction();

        try{
            $data['img']=$this->uploadFile($request , 'img' , 'courses' , $course->img);
            $course->update($data);
            DB::commit();
            return $course;

        }catch(Exception $e){
            DB::rollBack();
            Log::error('erorr: ' .$e->getMessage());
            throw new Exception('try again');

        }


    }


}







?>
