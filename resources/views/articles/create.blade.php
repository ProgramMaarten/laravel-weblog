@extends('layouts.app')

@section('title', 'Page Title')

@section('content')
<h1>Nieuw Artikel Aanmaken</h1>
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
    <button type="submit">Opslaan</button>
</form>
@endsection