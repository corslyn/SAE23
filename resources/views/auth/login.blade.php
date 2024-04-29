@extends('layout.base')

@section("title", "Login")


@section("body")
    <section class="container">
        
        <form action="{{ route("auth.login") }}" method="post">
            @csrf
 
            @error("loginerror")
                {{ $message }}
            @enderror

            @if(session() -> has("success"))
                <div class="success">
                    {{ session("success") }}
                </div>    
            @endif

            <div>
                @error("email") <div class="error">{{ $message }}</div> @enderror 
                <input type="email" name="email" id="email" value="{{ old("email") }}" placeholder="john@doe.fr" class="@error("email" || "loginerror" ) error-border @enderror">
            </div>
            
            <div>
                @error("password") <div class="error">{{ $message }}</div> @enderror 
                <input type="password" name="password" id="password" placeholder="••••••••" class="@error("password" || "loginerror") error-border @enderror">
            </div>
            
            <button>Login</button>
        </form>
    
    </section>
@endsection