@extends('layout.base')

@section("title", "Signup")


@section("body")
    <section class="container">
        
        <form action="{{ route("auth.signup") }}" method="post">
            @csrf
 
            <div>
                @error("name") <div class="error">{{ $message }}</div> @enderror 
                <input type="text" name="nom" id="nom" value="{{ old("nom") }}" placeholder="Doe" class="@error("nom") error-border @enderror">
            </div>
            <div>
                @error("prenom") <div class="error">{{ $message }}</div> @enderror 
                <input type="text" name="prenom" id="prenom" value="{{ old("prenom") }}" placeholder="John" class="@error("prenom") error-border @enderror">
            </div>
            <div>
                @error("domiciliation") <div class="error">{{ $message }}</div> @enderror 
                <input type="text" name="domiciliation" id="domiciliation" value="{{ old("domiciliation") }}" placeholder="John" class="@error("domiciliation") error-border @enderror">
            </div>
            <div>
                @error("groupe") <div class="error">{{ $message }}</div> @enderror 
                <input type="text" name="groupe" id="groupe" value="{{ old("domiciliation") }}" placeholder="John" class="@error("groupe") error-border @enderror">
            </div>
            <div>
                @error("sous_groupe") <div class="error">{{ $message }}</div> @enderror 
                <input type="text" name="sous_groupe" id="sous_groupe" value="{{ old("sous_groupe") }}" placeholder="John" class="@error("sous_groupe") error-border @enderror">
            </div>
            <div>
                @error("nom_formation") <div class="error">{{ $message }}</div> @enderror 
                <input type="text" name="nom_formation" id="nom_formation" value="{{ old("nom_formation") }}" placeholder="John" class="@error("nom_formation") error-border @enderror">
            </div>
            <div>
                @error("groupe") <div class="error">{{ $message }}</div> @enderror 
                <input type="text" name="domiciliation" id="domiciliation" value="{{ old("domiciliation") }}" placeholder="John" class="@error("domiciliation") error-border @enderror">
            </div>

            <div>
                @error("email") <div class="error">{{ $message }}</div> @enderror 
                <input type="email" name="email" id="email" value="{{ old("email") }}" placeholder="john@doe.fr" class="@error("email") error-border @enderror">
            </div>
            
            <div>
                @error("mot_de_passe") <div class="error">{{ $message }}</div> @enderror 
                <input type="mot_de_passe" name="mot_de_passe" id="mot_de_passe" placeholder="••••••••" class="@error("mot_de_passe") error-border @enderror">
            </div>
            
            <div>
                @error("mot_de_passe_confirmation") <div class="error">{{ $message }}</div> @enderror 
                <input type="password" name="mot_de_passe_confirmation" id="mot_de_passe_confirmation" placeholder="••••••••" class="@error("mot_de_passe_confirmation") error-border @enderror">
            </div>

            <button>Signup</button>
        </form>
    
    </section>
@endsection