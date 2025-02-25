@extends('layouts.app')

@section('title', 'Page Title')

@section('content')
<h1>Nieuw Artikel Aanmaken</h1>
<h2 style="color:red;">
        @if($errors->any())
        {{ $errors->first() }}
        <br>
    @endif
</h2>
<form action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <label for="title">Titel:</label>
    <input type="text" id="title" name="title" required>
    <br>
    <label for="content">Inhoud:</label>
    <textarea id="content" name="content"></textarea>
    <br>
    <label for="is_premium">Premium:</label>
    <input type="hidden" name="is_premium" value="0">
    <input type="checkbox" id="is_premium" name="is_premium" value="1">
    <br>
    <label for="image">Upload Image:</label>
    <input type="file" id="image" name="image" accept="image/*">
    <br>
    @foreach($categories as $category)
    <label for="category_{{ $category->id }}">{{ $category->name }}</label>
    <input type="checkbox" id="category_{{ $category->id }}" name="categories[]" value="{{ $category->id }}"
       {{ isset($article) && $article->categories->pluck('id')->contains($category->id) ? 'checked' : '' }}>
    @endforeach
    <br>
    <button type="submit">Opslaan</button>
</form>
@endsection