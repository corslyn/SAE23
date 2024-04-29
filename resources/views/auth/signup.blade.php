@extends('layout.base')

@section("title", "Signup")


@section("body")
    <section class="container">
        
        <form action="{{ route("auth.signup") }}" method="post">
            @csrf
 
            <div>
                @error("name") <div class="error">{{ $message }}</div> @enderror 
                <input type="text" name="name" id="name" value="{{ old("name") }}" placeholder="John Doe" class="@error("name") error-border @enderror">
            </div>
            
            <div>
                @error("email") <div class="error">{{ $message }}</div> @enderror 
                <input type="email" name="email" id="email" value="{{ old("email") }}" placeholder="john@doe.fr" class="@error("email") error-border @enderror">
            </div>
            
            <div>
                @error("password") <div class="error">{{ $message }}</div> @enderror 
                <input type="password" name="password" id="password" placeholder="••••••••" class="@error("password") error-border @enderror">
            </div>
            
            <div>
                @error("password_confirmation") <div class="error">{{ $message }}</div> @enderror 
                <input type="password" name="password_confirmation" id="password_confirmation" placeholder="••••••••" class="@error("password_confirmation") error-border @enderror">
            </div>

            <button>Signup</button>
        </form>
    
    </section>
@endsection