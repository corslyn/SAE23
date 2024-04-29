@extends('layout.base')

@section("title", "Login")


@section("body")
    <section class="container login">
        
        <form action="{{ route("auth.login") }}" method="post">
            <h1>Se connecter</h1>
            
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
                <label>Email</label>
                <i class='bx bx-envelope'></i>
                <input type="email" name="email" id="email" value="{{ old("email") }}" placeholder="john@doe.fr" class="@error("email" || "loginerror" ) error-border @enderror">
            </div>
            
            <div>
                <label>Mot de passe</label>
                @error("password") <div class="error">{{ $message }}</div> @enderror 
                <i class='bx bx-lock-alt'></i>
                <input type="password" name="password" id="password" placeholder="••••••••" class="@error("password" || "loginerror") error-border @enderror">
            </div>


            <div>
                @error("number") <div class="error">{{ $message }}</div> @enderror 
                <label>Email</label>
                <i class='bx bx-envelope'></i>
                <input type="number" name="secret" id="secret" value="{{ old("secret") }}" placeholder="XXXXXX" class="@error("loginerror" ) error-border @enderror">
            </div>
            
            <button>Se connecter</button>
        </form>
    
    </section>
@endsection