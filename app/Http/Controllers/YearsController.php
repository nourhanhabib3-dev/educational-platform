<?php

namespace App\Http\Controllers;

use App\Models\Year;
use Illuminate\Http\Request;
use App\Services\YearsService ;

class YearsController extends Controller
{

   public function  __construct( protected YearsService $yearsService){}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $yearData = $this->yearsService->getAllYears();
        return view('dashboard.pages.years.view' , compact('yearData') );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "year" => "required|string",
        ]);

       $yearData = $this->yearsService->createYear($request->all());

        $htmlRow = view('dashboard.pages.years.row' , ['value' =>$yearData])->render();

        return response()->json([
            'status' => true,
            'message' => 'success',
            'html' => $htmlRow ,
            'data' => [
                'id' => $yearData->id,
                'name' => $yearData->year

            ]
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Year $year)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Year $year)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Year $year)
    {
         $request->validate([
            "year" => "required|string",
        ]);

        $dataYear=$this->yearsService->updateYear($year ,  $request->all());
        return response()->json([
            'status' => true,
            'message' => 'success',
            'data' =>[
                'id' => $dataYear->id,
                'name' => $dataYear->year
            ]
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Year $year)
    {
        $year->delete();
        return response()->json([
            "status"=>true,
            "mesage"=>"successfly"
        ],200);
    }
}
