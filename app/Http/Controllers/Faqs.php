<?php

namespace App\Http\Controllers;

use App\Models\Faqs as ModelsFaqs;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class Faqs extends Controller
{
   /**
     * To validate All the data
     */
    public function validateData($request)
    {
        $validate = $request->validate([
            'question' => 'required',
            'longdescription'   => 'required'
        ]);

        return $validate;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $faqs = ModelsFaqs::paginate(10);
        $totalfaqs = ModelsFaqs::count();
        return view('Admin.Table.faqs', compact('faqs', 'totalfaqs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.Add.faqs');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $this->validateData($request);

        $newFaqs = new ModelsFaqs($validateData);

        $newFaqs->save();
        
        // try {
        //     $terms = ModelsFaqs::find($newterms->id);
        //     $newsletter = NewsLetter::all();
        //     foreach ($newsletter as $value) {
        //         Mail::to($value['email'])->send(new NewTerms($terms));
        //     }
        // } catch (\Exception $e) {
        //     dd('Something Went Wrong While Sending Email.');
        // }

        return redirect()->route('faqs.index')->with('message', "FAQs Added Successfully.");
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $faq = ModelsFaqs::find($id);
        return view('Admin.Show_One_Result.faqs', compact('faq'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $faq = ModelsFaqs::find($id);
        return view('Admin.Edit.faqs', compact('faq'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validate = $this->validateData($request);
        $updatefaqs = ModelsFaqs::find($id);
        $updatefaqs->update($validate);

        return redirect()->route('faqs.index')->with('message', "Faqs Updated Successfully.");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $faqs = ModelsFaqs::find($id);
        $faqs->delete();
        return redirect()->route('faqs.index')->with('message', 'Faqs Deleted Successfully.');
    }
}
