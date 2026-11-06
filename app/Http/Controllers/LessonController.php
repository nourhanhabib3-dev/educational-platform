<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLessonRequest;
use App\Models\Course;
use App\Models\Lesson;
use App\Services\LessonService;
use Exception;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LessonController extends Controller
{
    public function __construct(protected LessonService $lessonService) {}
    use AuthorizesRequests, ValidatesRequests;


    /**
     * Display a listing of the resource.
     */
    public function index(Course $course)
    {
        $this->authorize('viewAny', [Lesson::class, $course]);
        $lessons = $course->lessons;

        return view('dashboard.pages.lesson.view', compact(['lessons', 'course']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Course $course)
    {
        $this->authorize('create', [Lesson::class , $course]);
        return view('dashboard.pages.lesson.add', compact('course'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLessonRequest $request , Course $course)
    {
        try{
            $this->lessonService->storeLesson($request->validated() , $request , $course );
            return to_route('course.lesson.index' , $course);
        }catch(Exception $e){
            return response()->json([
                'satuts' => false,
                'message' => $e->getMessage(),
            ]);

        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Lesson $lesson)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lesson $lesson)
    {
        $this->authorize('update', $lesson);
        $lesson->load('course');

        $teacherId = Auth::guard('tech')->user()->id;
        $courses = Course::where('teacher_id', $teacherId)->get();
        return view('dashboard.pages.courses.update', compact(['lesson', 'courses']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lesson $lesson)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course , Lesson $lesson)
    {
        $this->authorize('delete' , [$lesson, $course]);
        $this->lessonService->deleteLesson($lesson);

        return response()->json([
            'status' => true ,
            'message' =>'lesson deleted successfully '
        ], 200);
    }
}
