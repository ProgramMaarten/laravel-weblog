<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Comment;

use App\Http\Requests\StoreCommentRequest;

class CommentController extends Controller
{
    //
    
    public function store(StoreCommentRequest $request, Article $article)
    {
        //
        
        $validatedData = $request->validated();
        $validatedData['user_id'] = auth()->id();
        
        //dd($validatedData);
        //$validatedData['article_id'] = $article->id;
        Comment::create($validatedData);

        return redirect()->back();
    }
}
