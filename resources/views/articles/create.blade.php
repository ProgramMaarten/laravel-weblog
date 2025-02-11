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
    <label for="user_id">Gebruiker(tijdelijk als test):</label>
    <input type="int" id="user_id" name="user_id">
    <label for="image">Upload Image:</label>
    <input type="file" id="image" name="image" accept="image/*">
    <br>
    <button type="submit">Opslaan</button>
</form>
@endsection