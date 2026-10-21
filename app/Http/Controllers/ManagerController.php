<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreManagerRequest;
use App\Http\Requests\UpdataManagerRequest;
use App\Models\Manager;
use Illuminate\Http\Request;
use App\Services\ManagerService;

class ManagerController extends Controller
{


    public function __construct(protected ManagerService $managerService){}


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=Manager::latest()->paginate(5);
        return view('dashboard.pages.managers.view' , compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.pages.managers.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreManagerRequest $request)
    {
       $this->managerService->creatManager($request->validated());
        return to_route('manager.index');

    }
    public function edit(Manager $manager)
    {
        return view('dashboard.pages.managers.edit' , compact('manager'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdataManagerRequest $request, Manager $manager)
    {
        $this->managerService->updateManager( $manager , $request->validated());

        return to_route('manager.index');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Manager $manager)
    {
        $manager->delete();

        return response()->json([
            'status' => true,
            'message' => 'success'
        ], 200);
    }
}