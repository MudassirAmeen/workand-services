<?php

namespace App\Http\Controllers;

use App\Models\Features as ModelsFeatures;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class Features extends Controller
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
            'color'            => 'required',
            'percentage'       => 'required|numeric|min:0|max:100',
        ]);

        return $validate;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $features = ModelsFeatures::paginate(10);
        $totalFeatures = ModelsFeatures::count();
        return view('Admin.Table.feature', compact('features', 'totalFeatures'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.Add.feature');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validateData = $this->validateData($request);

        $newFeature = new ModelsFeatures($validateData);

        // Save the feature image
        $image             = $validateData['image'];
        $newFeature->image = $image;
        $newFeature->save();

        return redirect()->route('feature.index')->with('message', "Feature Added Successfully.");
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $feature = ModelsFeatures::find($id);
        return view('Admin.Show_One_Result.feature', compact('feature'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $feature = ModelsFeatures::find($id);
        return view('Admin.Edit.feature', compact('feature'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $validate = $request->validate([
            'name'             => 'required|max:100',
            'shortdescription' => 'required',
            'color'            => 'required',
            'percentage'       => 'required|numeric|min:0|max:100',
        ]);

        $updateFeature = ModelsFeatures::find($id);
        $updateFeature->update($validate);

        return redirect()->route('feature.index')->with('message', "Feature Updated Successfully.");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $feature = ModelsFeatures::find($id);
        Storage::delete('public/AdminPanel/assets/Features/'.$feature->image);
        $feature->delete();
        return redirect()->route('feature.index')->with('message', 'Feature Deleted Successfully.');
    }
}
