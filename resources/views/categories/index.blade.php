@extends('layouts.app')

@section('title', 'Page Title')
<h1>Alle Artikelen</h1>
@section('content')
    <!-- <p>This is the index for the page.</p> -->
    <table>
    <thead>
        <tr>
            <th>Categorie</th>
        </tr>
    </thead>
    <tbody>
    @foreach($categories as $category)
    <tr>
        <td>{{ $category->name }}</td>
        <td>    
            <form action="{{ route('categories.destroy', $category->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">Verwijderen</button>
            </form>
        </td>
    </tr>
    @endforeach
    <tr>
        <td><form action="{{ route('categories.store', $category->id) }}" method="POST">
                @csrf
            <label for="name">Naam:</label>
            <input type="text" id="name" name="name" required>
            <button type="submit">Opslaan</button>
            </form>
        </td>
        
    <tr>
    </tbody>

</table>
@endsection