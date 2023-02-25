<?php

namespace App\Http\Controllers;

use App\Models\Testimonials as ModelsTestimonials;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class Testimonials extends Controller
{

    /**
     * To validate All the data
     */
    public function validateData($request)
    {
        $validate = $request->validate([
            'name'       => 'required|max:100',
            'image'      => 'required',
            'alttext'    => 'required',
            'profession' => 'required',
            'comment'    => 'required'
        ]);

        return $validate;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $testimonials = ModelsTestimonials::paginate(10);
        $totaltestimonials = ModelsTestimonials::count();
        return view('Admin.Table.testimonial', compact('testimonials', 'totaltestimonials'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.Add.testimonial');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $this->validateData($request);

        $newTestimonial = new ModelsTestimonials($validateData);

        // Save the Testimonial image
        $image             = $validateData['image'];
        $newTestimonial->image = $image;

        $newTestimonial->save();

        return redirect()->route('testimonial.index')->with('message', "Testimonial Added Successfully.");
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $testimonial = ModelsTestimonials::find($id);
        return view('Admin.Show_One_Result.testimonial', compact('testimonial'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $testimonial = ModelsTestimonials::find($id);
        return view('Admin.Edit.testimonial', compact('testimonial'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'name'       => 'required|max:100',
            'comment'    => 'required',
            'profession' => 'required'
        ]);

        $updateTestimonial = ModelsTestimonials::find($id);
        $updateTestimonial->update($validate);

        return redirect()->route('testimonial.index')->with('message', "Testimonial Updated Successfully.");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $Testimonial = ModelsTestimonials::find($id);
        $Testimonial->delete();
        return redirect()->route('testimonial.index')->with('message', 'Testimonial Deleted Successfully.');
    }
}
