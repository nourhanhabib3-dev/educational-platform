<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTeacherRequest;
use App\Http\Requests\UpdateTeacherRequest;
use App\Models\Sub;
use App\Models\teacher;
use Illuminate\Support\Facades\Storage;
use App\Services\TeacherService;
use Exception;

class TeacherController extends Controller
{


    public function __construct(protected TeacherService $teacherService) {}




    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teacher = teacher::with('sub')->latest()->paginate(5);

        return view('dashboard.pages.teachers.view', compact('teacher'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $sub = Sub::all();
        return view('dashboard.pages.teachers.add', compact('sub'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTeacherRequest $request)
    {


        try {
            $this->teacherService->createTeacher($request->validated(), $request);
            return to_route('teacher.index')->with('success');
        } catch (Exception $e) {

           return response()->json([
            'satuts' =>false,
            'message' => $e->getMessage(),
           ]);

            // return back()->withInput()->with('error', $e->getMessage());

        }


    }

    /**
     * Display the specified resource.
     */
    public function show(teacher $teacher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(teacher $teacher)
    {
        $sub = Sub::all();
        return view('dashboard.pages.teachers.edit', compact(['teacher', 'sub']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTeacherRequest $request, teacher $teacher)
    {
        try {
            $this->teacherService->updateTeacher($teacher, $request->validated(), $request);
            return to_route('teacher.index');
        } catch (Exception $e) {
            return back()->withInput()->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $teacher = teacher::findOrFail($id);

        if ($teacher->img) {
            Storage::disk('public')->delete($teacher->img);
        };

        $teacher->delete();

        return response()->json([
            'status' => true,
            'message' => 'success'
        ], 200);
    }
}
