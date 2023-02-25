<?php

namespace App\Http\Controllers;

use App\Mail\NewPolicy;
use App\Models\NewsLetter;
use App\Models\Privacy as ModelsPrivacy;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Mail;

class Privacy extends Controller
{
    /**
     * To validate All the data
     */
    public function validateData($request)
    {
        $validate = $request->validate([
            'heading'     => 'required',
            'longdescription' => 'required'
        ]);

        return $validate;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $policies = ModelsPrivacy::paginate(10);
        $totalpolicies = ModelsPrivacy::count();
        return view('Admin.Table.privacy', compact('policies', 'totalpolicies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.Add.privacy');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $this->validateData($request);

        $newPolicy = new ModelsPrivacy($validateData);

        $newPolicy->save();
        
        try {
            $Policy = ModelsPrivacy::find($newPolicy->id);
            $newsletter = NewsLetter::all();
            foreach ($newsletter as $value) {
                Mail::to($value['email'])->send(new NewPolicy($Policy));
            }
        } catch (\Exception $e) {
            dd('jlsaf lsdaf');
        }

        return redirect()->route('policy.index')->with('message', "Policy Added Successfully.");
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $policy = ModelsPrivacy::find($id);
        return view('Admin.Show_One_Result.privay', compact('policy'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $policy = ModelsPrivacy::find($id);
        return view('Admin.Edit.privacy', compact('policy'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validate = $this->validateData($request);
        $updatepolicy = ModelsPrivacy::find($id);
        $updatepolicy->update($validate);

        return redirect()->route('policy.index')->with('message', "Policy Updated Successfully.");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $policy = ModelsPrivacy::find($id);
        $policy->delete();
        return redirect()->route('policy.index')->with('message', 'Policy Deleted Successfully.');
    }
}
