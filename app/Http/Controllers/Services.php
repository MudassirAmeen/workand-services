<?php

namespace App\Http\Controllers;

use App\Models\Services as ModelsServices;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class Services extends Controller
{
    /**
     * To validate All the data
     */
    public function validateData($request)
    {
        $validate = $request->validate([
            'name'             => 'required|max:100',
            'image'            => 'required',
            'alttext'          => 'required',
            'shortdescription' => 'required',
            'longdescription'  => 'required'
        ]);

        return $validate;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = ModelsServices::paginate(10);
        $totalServices = ModelsServices::count();
        return view('Admin.Table.services', compact('services', 'totalServices'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.Add.services');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $this->validateData($request);

        $newProject = new ModelsServices($validateData);

        // Save the Service image
        $image             = $validateData['image'];
        $newProject->image = $image;
        $newProject->save();

        return redirect()->route('service.index')->with('message', "Project Added Successfully.");
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $service = ModelsServices::find($id);
        return view('Admin.Show_One_Result.services', compact('service'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $service = ModelsServices::find($id);
        return view('Admin.Edit.services', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $validate = $request->validate([
            'name'             => 'required|max:100',
            'shortdescription' => 'required',
            'longdescription'  => 'required'
        ]);

        $updateService = ModelsServices::find($id);
        $updateService->update($validate);

        return redirect()->route('service.index')->with('message', "Service Updated Successfully.");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $service = ModelsServices::find($id);
        $service->delete();
        return redirect()->route('service.index')->with('message', 'Service Deleted Successfully.');
    }
}
