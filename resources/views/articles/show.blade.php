@extends('layouts.app')

@section('title', 'Page Title')

@section('content')
<h1>{{ $article->title }}</h1>
<p>{{ $article->content }}</p>
<img src={{asset('storage/'.$article->image)}} alt="Image">
<h2>comment sectie<h2>
<form action="{{ route('comments.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <label for="content">Comment:</label>
    <textarea id="content" name="content"></textarea>
    <input type="hidden" name="article_id" value="{{$article->id}}" >
    <br>
    <button type="submit">Plaats commentaar</button>
</form>
<table>
    <thead>
        <tr>
            <th>User</th>
            <th>Comment</th>
    </thead>
    <tbody>
@foreach($comments as $comment)
<tr>
    <td>{{$comment->user_id}}</td>
    <td>{{$comment->content}}</td>
</tr>
@endforeach
    </tbody>
@endsection