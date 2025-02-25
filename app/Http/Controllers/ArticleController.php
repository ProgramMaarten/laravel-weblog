<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Models\Article;
use App\Models\Category;
use App\Models\Comment;

use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;



class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $articles = Article::orderBy('created_at', 'desc')->get();
        $categories = Category::all();
        //dd($articles);
        return view('articles.index', compact('articles', 'categories'));
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
        $categories = Category::orderBy('name', 'asc')->get(); // get all categories
        return view('articles.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreArticleRequest $request)
    {
        $validatedData = $request->validated();
        
        $validatedData['user_id'] = auth()->id();

        if ($request->file('image')) {
        $path = $request->file('image')->store('images');
        $validatedData['image'] = $path;
        };

        
        $article = Article::create($validatedData);
        

        $article->categories()->sync($validatedData['categories']);
        //dd($path, $article);
    
        return redirect()->route('articles.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        //
        if ($article['is_premium']==1 && auth()->user()==NULL){
            return back()->withErrors([
                'premium' => 'Jij dwaas! Je bent helemaal niet ingelogd. Jij dacht toch zeker niet dit PREMIUM artikel te kunnen bekijken.',
            ]);
        }


        if ($article['is_premium']==1 && auth()->user()['premium']==0){
            return back()->withErrors([
                'premium' => 'Jij dwaas! Je bent helemaal niet premium. Jij dacht toch zeker niet dit artikel te kunnen bekijken.',
            ]);
        }
        
        $comments = Comment::where('article_id', $article['id'])->orderBy('created_at', 'desc')->get();
        // dd(file($article->image));
            
        return view('articles.show', compact('article', 'comments'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article) {
        
        $categories = Category::orderBy('id', 'asc')->get();
        return view('articles.edit', compact('article', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateArticleRequest $request, Article $article)
    {
        
        
        $validatedData = $request->validated(); // Validate the incoming data.

        $article->update($validatedData); // update the article.

        $article->categories()->sync($validatedData['categories']); // update the article_category pivot table
        //dd($article->categories(), $validatedData['categories'] ,$request);

        return redirect()->route('articles.userIndex');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article) {
        $article->delete();
        return redirect()->route('articles.userIndex');
    }
}
