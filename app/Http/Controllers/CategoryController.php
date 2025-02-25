<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

use App\Http\Requests\StoreCategoryRequest;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $categories = Category::orderBy('name', 'asc')->get();
        //dd($articles);
        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        //
        $validatedData = $request->validated();
        Category::create($validatedData);

        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $articles = Category::where('id', $request->categories)->with('articles')->first()->articles;
        
        $categories = Category::all();

        return view('articles.index', compact('articles', 'categories'));       
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category) {
        $category->delete();
        return redirect()->route('categories.index');
    }
}
