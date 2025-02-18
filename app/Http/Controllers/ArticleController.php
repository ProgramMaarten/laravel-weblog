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

    public function userIndex() {
        $articles = Article::where('user_id', auth()->id())->orderBy('created_at', 'desc')->get();
        //dd($articles);
        //$articles = auth()->user()->articles;
        return view('articles.user_index', compact('articles'));
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
        
        // Add the logged in user
        $validatedData['user_id'] = auth()->id();
        
        Article::create($validatedData);
    
        return redirect()->route('articles.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        //
        if ($article['is_premium']==1 && auth()->user()['premium']==0){
            return back()->withErrors([
                'premium' => 'Jij dwaas! Je bent helemaal niet premium. Jij dacht toch zeker niet dit artikel te kunnen bekijken.',
            ]);
        }
            
        return view('articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article) {
        //$article = Article::find($id);
        return view('articles.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateArticleRequest $request, Article $article)
    {
        // Validate the incoming data.
        $validatedData = $request->validated();

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
