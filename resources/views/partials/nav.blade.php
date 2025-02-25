<nav>
    <ul>
        @guest
        <li><a href="{{ route('auth.login') }}">Log In</a></li>
        @endguest
        @auth
        <form action="{{ route('auth.logout') }}" method="POST">
            @csrf
            <button type="submit">Logout</button>
        </form>
        @endauth
       <li><a href="{{ route('articles.index') }}">Article List</a></li>
       @auth
       <li><a href="{{ route('articles.userIndex') }}">My articles</a></li>
       <li><a href="{{ route('articles.create') }}">Create Post</a></li>
       <li><a href="{{ route('categories.index') }}">Categories</a></li>
       <li><a href="{{ route('users.premium') }}">Koop premium</a></li>
       @endauth
       <!-- <li><a href="{{ route('articles.create') }}">Create Category</a></li> -->
    </ul>
</nav>