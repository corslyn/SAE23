@extends('layout.base')

@section("title", "Se connecter")

@section("body")

    <section class="container login">

        <form action="{{ route("auth.login") }}" method="post">
            <h1>Se connecter</h1>

            @csrf

            @error("loginerror")
                <div class="error">
                    {{ $message }}
                </div>
            @enderror

            @if(session() -> has("success"))
                <div class="success">
                    {{ session("success") }}
                </div>
            @endif

            <div>
                @error("email") <div class="error">{{ $message }}</div> @enderror
                <label>Email <span class="error">*</span></label>
                <i class='bx bx-envelope'></i>
                <input type="email" name="email" id="email" value="{{ old("email") }}" placeholder="john@doe.fr" class="@error("email" || "loginerror" ) error-border @enderror">
            </div>

            <div>
                <label>Mot de passe <span class="error">*</span></label>
                @error("password") <div class="error">{{ $message }}</div> @enderror
                <i class='bx bx-lock-alt'></i>
                <input type="password" name="password" id="password" placeholder="••••••••" class="@error("password" || "loginerror") error-border @enderror">
            </div>


            <div>
                @error("secret") <div class="error">{{ $message }}</div> @enderror
                <label>Code</label>
                <p style="color: grey; font-style: italic; font-size: 12px;">Laissez vide si vous n'utilisez pas l'A2F</p>
                <i class='bx bx-key'></i>
                <input type="number" name="secret" id="secret" value="{{ old("secret") }}" placeholder="XXXXXX" class="@error("secret" || "loginerror") error-border @enderror">
            </div>

            <button>Se connecter</button>
        </form>

    </section>
@endsection
