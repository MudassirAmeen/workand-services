<?php

namespace App\Http\Controllers;

use App\Mail\NewTerms;
use App\Models\NewsLetter;
use App\Models\TermsAndConditions as ModelsTermsAndConditions;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Mail;

class TermsAndConditions extends Controller
{
    /**
     * To validate All the data
     */
    public function validateData($request)
    {
        $validate = $request->validate([
            'heading' => 'required',
            'longdescription'   => 'required'
        ]);

        return $validate;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $terms = ModelsTermsAndConditions::paginate(10);
        $totalterms = ModelsTermsAndConditions::count();
        return view('Admin.Table.terms', compact('terms', 'totalterms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.Add.terms');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $this->validateData($request);

        $newterms = new ModelsTermsAndConditions($validateData);

        $newterms->save();
        
        try {
            $terms = ModelsTermsAndConditions::find($newterms->id);
            $newsletter = NewsLetter::all();
            foreach ($newsletter as $value) {
                Mail::to($value['email'])->send(new NewTerms($terms));
            }
        } catch (\Exception $e) {
            dd('Something Went Wrong While Sending Email.');
        }

        return redirect()->route('terms.index')->with('message', "Policy Added Successfully.");
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $term = ModelsTermsAndConditions::find($id);
        return view('Admin.Show_One_Result.terms', compact('term'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $term = ModelsTermsAndConditions::find($id);
        return view('Admin.Edit.terms', compact('term'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validate = $this->validateData($request);
        $updateTerms = ModelsTermsAndConditions::find($id);
        $updateTerms->update($validate);

        return redirect()->route('terms.index')->with('message', "Terms Updated Successfully.");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $terms = ModelsTermsAndConditions::find($id);
        $terms->delete();
        return redirect()->route('terms.index')->with('message', 'Terms Deleted Successfully.');
    }
}
