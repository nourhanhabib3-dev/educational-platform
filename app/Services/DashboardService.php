<?php

namespace App\Services;

use App\Models\Course;
use App\Models\Lesson;
use App\Models\Student;
use App\Models\teacher;

class DashboardService
{

    public function managerStats(): array
    {
        return [
            'card1' =>['title' => 'Total Students' ,'count' => Student::count()],
            'card2' => ['title' => 'Total Teachers' , 'count' => teacher::count()],
            'card3' => ['title' => 'Total Courses' , 'count' => Course::count()],
        ];

    }


    public function teacherStats(int $teacherId): array
    {
        return[
            'card1' => ['title' => 'Total Courses' , 'count' => Course::where('teacher_id' , $teacherId)->count()] ,
            'card2' =>['title' => 'Total Lessons' ,'count' => Lesson::whereHas('course' , function($q) use ($teacherId){
                $q->where('teacher_id' , $teacherId);
            })->count()] ,
            'card3' =>['title' => 'Total Students' , 'count'=>  Student::whereHas('courses' , function($q) use ($teacherId){
                $q->where('teacher_id' , $teacherId);
            })->count()],
        ];
    }

}
