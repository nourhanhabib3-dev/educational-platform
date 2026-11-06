<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdataStudentRequest;
use App\Models\Student;
use App\Models\Year;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Student::with('year')->latest()->paginate(5);
        return view('dashboard.pages.Student.view' , compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $year=Year::all();
        return view('dashboard.pages.Student.add' , compact('year'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStudentRequest $request)
    {
        Student::create($request->validated());
        return to_route('student.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        $year=Year::all();
        return view('dashboard.pages.Student.edit' , compact(['student','year']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdataStudentRequest $request, Student $student)
    {
        $student->update($request->validated());
        return to_route('student.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $student->delete();
        return response()->json([
            "status"=>true,
            "message"=>'successfly'
        ]);


    }
}
