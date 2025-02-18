@extends('layouts.app')

@section('title', 'Page Title')
<h1>Log in</h1>
@section('content')

<form action="{{ route('auth.authenticate') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if($errors->any())
        {{ $errors->first() }}
        <br>
    @endif
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required/>
    <br>
    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required/>
    <br>     
    <button type="submit">Log in</button>
</form>
@endsection