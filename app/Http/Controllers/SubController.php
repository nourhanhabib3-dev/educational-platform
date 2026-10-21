<?php

namespace App\Http\Controllers;

use App\Models\Sub;
use App\Models\Year;
use App\Services\SubService;
use App\Services\YearsService;
use Illuminate\Http\Request;

class SubController extends Controller
{

   public function __construct( protected   SubService $subService ){}


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $years=Year::all();
        $subData=Sub::with('year')->get();


        return view('dashboard.pages.subs.view' ,compact(['subData' , 'years']));
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
            "name"=>"required|string",
        ]);

        $subData = $this->subService->createSub($request->all());
        $htmlRow = view('dashboard.pages.subs.row' ,['value' =>$subData])->render();


        return response()->json([
            'status' => true ,
            'message' => 'successfly',
            'html'=>$htmlRow,
            'data' =>$subData
        ]);


    }

    /**
     * Display the specified resource.
     */
    public function show(Sub $sub)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sub $sub)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sub $sub)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sub $sub)
    {
        $sub->delete();
        // return to_route('sub.index');

        return response()->json([
            "status" => true,
            "message"=>"successfuly"
        ],200);
    }
}
