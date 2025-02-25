@extends('layouts.app')

@section('title', 'Page Title')

@section('content')
<h1>{{ $user->username }}</h1>
<p>{{ $user->email }}</p>
<form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <label for="premium">Premium:</label>
    <input type="hidden" name="premium" value="0">
    <input type="checkbox" id="premium" name="premium" value="1" {{ $user->premium ? 'checked' : '' }}>
    <br>
    <button type="submit">Bijwerken</button>
</form>
@endsection