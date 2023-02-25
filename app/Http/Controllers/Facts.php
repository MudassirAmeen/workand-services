<?php

namespace App\Http\Controllers;

use App\Models\Facts as ModelsFacts;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class Facts extends Controller
{

    public function validateData($request)
    {
        $validateData = $request->validate([
            'teammembers'       => 'required|numeric',
            'experience'        => 'required|numeric',
            'satisfiedclients'  => 'required|numeric',
            'completedprojects' => 'required|numeric'
        ]);

        return $validateData;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $facts = ModelsFacts::all();
        $totalFacts = ModelsFacts::count();
        return view('Admin.Table.facts', compact('facts', 'totalFacts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $facts = ModelsFacts::count();
        if ($facts == 0) {
            return view('Admin.Add.facts');
        }else{
            return redirect()->route('fact.edit', ['fact'=> "1"]);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $this->validateData($request);

        $newFacts = new ModelsFacts($validatedData);

        $newFacts->save();

        return redirect()->route('fact.index');

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $facts = ModelsFacts::find($id);
        return view('Admin.Edit.facts', compact("facts"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $this->validateData($request);

        $updateFacts = ModelsFacts::find($id);
        $updateFacts->update($validatedData);

        return redirect()->route('fact.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }
}
