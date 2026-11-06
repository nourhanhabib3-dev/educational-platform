<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use App\Models\Course;
use App\Models\Sub;
use App\Models\teacher;
use App\Services\CourseService;
use Exception;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use function Pest\Laravel\delete;

class CourseController extends Controller
{
    public function __construct(protected CourseService $course_service) {}
    use AuthorizesRequests, ValidatesRequests;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('viewAny', Course::class);
        $data = $this->course_service->getAllCourses();
        return view('dashboard.pages.courses.view', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $sub = Sub::all();
        return view('dashboard.pages.courses.add', compact('sub'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCourseRequest $request)
    {
        try {
            $this->course_service->createCourse($request->validated(), $request);
            return to_route('course.index');
        } catch (Exception $e) {
            return response()->json([
                'satuts' => false,
                'message' => $e->getMessage(),
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        $sub= Sub::all();
        return view('dashboard.pages.courses.update' , compact(['course' , 'sub']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCourseRequest $request, Course $course)
    {
        $this->authorize('update' , $course);

        try{
            $this->course_service->updataCourse($request->validated() , $request , $course);
            return to_route('course.index');

        }catch(Exception $e){
            return back()->withInput()->with('error', $e->getMessage());



        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        $this->authorize('delete', $course);

        if ($course->img) {
            Storage::disk('public')->delete($course->img);
        }

        $course->delete();
        return response()->json([
            'status' => true,
            'message' => 'successfully'
        ], 200);
    }
}
