@extends('layouts.app')

@section('title', 'Page Title')
<h1>Alle Artikelen</h1>
@section('content')
    <!-- <p>This is the index for the page.</p> -->
    <h2>
        @if($errors->any())
        {{ $errors->first() }}
        <br>
    @endif
    </h2>
<!-- Form for filtering on category -->
    <form action="{{ route('categories.show') }}" method="GET">
            @foreach($categories as $category)
            <label>
                <input type="checkbox" name="categories" value="{{ $category->id }}">                
                {{ $category->name }}
            </label>
            <br>
        @endforeach
<button type="submit">Filter</button>
    </form>

    <table>
    <thead>
        <tr>
            <th>Premium</th>
            <th>Titel</th>
            <th>User</th>
            <th>Created at</th>
            <th>Acties</th>
        </tr>
    </thead>
    <tbody>
    @foreach($articles as $article)
    <tr>
        <td>{{ $article->is_premium }}</td>
        <td><a href="{{ route('articles.show', $article->id) }}">{{ $article->title }}<a></td>
        <td>{{ $article->user_id }}</td>
        
        <td>{{ $article->created_at->format('Y-m-d')}}</td>
        {{--<td>    
            <form action="{{ route('articles.destroy', $article->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">Verwijderen</button>
            </form>
        </td>
        <td>
        <button><a href="{{ route('articles.edit', $article->id) }}">Bewerken</a></button>
        </td>--}}
    </tr>
    @endforeach
    </tbody>
</table>
@endsection