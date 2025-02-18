@extends('layouts.app')

@section('title', 'Page Title')

@section('content')
<h1>{{ $user->username }}</h1>
<p>{{ $user->email }}</p>

<h2>Hier komt de comment sectie<h2>
@endsection