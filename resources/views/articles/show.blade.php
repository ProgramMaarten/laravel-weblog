@extends('layouts.app')

@section('title', 'Page Title')

@section('content')
<h1>{{ $article->title }}</h1>
<p>{{ $article->content }}</p>

<h2>Hier komt de comment sectie<h2>
@endsection