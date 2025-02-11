@extends('layouts.app')

@section('title', 'Page Title')

@section('content')
<h1>Artikel Bewerken</h1>
<form action="{{ route('articles.update', $article->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <label for="title">Titel:</label>
    <input type="text" id="title" name="title" value="{{ $article->title }}" required>
    <br>
    <label for="content">Inhoud:</label>
    <textarea id="content" name="content">{{ $article->content }}</textarea>
    <br>
    <label for="user_id">Gebruiker(tijdelijk als test):</label>
    <input type="int" id="user_id" name="user_id" value="{{ $article->user_id }}">
    <label for="image">Upload Image:</label>
    <input type="file" id="image" name="image" accept="image/*" value="{{ $article->image }}">
    <br>
    <button type="submit">Bijwerken</button>
</form>
@endsection