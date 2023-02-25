<?php

namespace App\Http\Controllers;

use App\Models\Category as ModelsCategory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class Category extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = ModelsCategory::all();
        $totalCategories = ModelsCategory::count();
        return view('Admin.table.category', compact('categories', 'totalCategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.Add.category');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required'
        ]);

        $name = str_replace(' ', '-', $validate['name']);
        $newCategory = new ModelsCategory($validate);
        $newCategory->name = $name;

        $newCategory->save();

        return redirect()->route('category.index');
    }

    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $category = ModelsCategory::find($id)->first();
        $category->delete();
        return redirect()->route('category.index')->with('message', 'Category Deleted Successfully.');
    }
}
