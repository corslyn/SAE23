<nav>
     <div>
        {{-- Logo --}}
        <a href="/">{{ config("app.name") }}</a>
     </div>

     <div>
         @if(session() -> has("id"))
            <a href="{{ route("auth.logout") }}">Logout</a>
         @else
            <a href="{{ route("auth.login") }}">Login</a>
            <a href="{{ route("auth.signup") }}">Signup</a>
         @endif
      </div>
</nav>