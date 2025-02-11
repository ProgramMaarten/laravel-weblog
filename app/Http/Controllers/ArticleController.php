<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Article;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $articles = Article::orderBy('created_at', 'desc')->get();
        //dd($articles);
        return view('articles.index', compact('articles'));
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
    public function store(StoreArticleRequest $request)
    {
        // Validate the incoming data.
        $validatedData = $request->validated();
    
        // $article = new Article();
        // $article->title   = $validatedData['title'];
        // $article->content = $validatedData['content'] ?? '';
        // $article->user_id = $validatedData['user_id'];
    
        // // Check if an image file was uploaded.
        // if ($request->hasFile('image')) {
        //     // Store the image in the "public/images" directory.
        //     $path = $request->file('image')->store('images', 'public');
        //     $article->image = $path; // Ensure your database has an "image" column.
        // }
    
        // $article->save();

        Article::create($validatedData);
    
        return redirect()->route('articles.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id) {
        $article = Article::find($id);
        return view('articles.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateArticleRequest $request, Article $article)
    {
        // Validate the incoming data.
        $validatedData = $request->validated();

        // // Update the article's fields.
        // $article->title   = $validatedData['title'];
        // $article->content = $validatedData['content'] ?? '';
        // $article->user_id = $validatedData['user_id'];

        // // Check if an image file was uploaded.
        // if ($request->hasFile('image')) {
        //     // Optionally delete the previous image from storage if needed.
        //     // Store the new image in the "public/images" directory.
        //     $path = $request->file('image')->store('images', 'public');
        //     $article->image = $path; // Make sure your database has an "image" column.
        // }

        // $article->save();

        $article->update($validatedData);

        return redirect()->route('articles.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article) {
        $article->delete();
        return redirect()->route('articles.index');
    }
}
