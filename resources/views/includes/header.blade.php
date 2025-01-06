@if (Route::has('login'))
<!--
    <div class="top-right links">
        @auth
            <a href="{{ url('/home') }}">Home</a>
            <a href="{{ route('logout') }}">Logout</a>
        @endauth
    </div>
-->
@endif
