@extends('layout.base')

@section("title", "Signup")


@section("body")
    <section class="login-container">
        
        <form action="{{ route("auth.signup") }}" method="post">
            @csrf
 
            <div>
                <div>Email:</div>
                @error("email") <div class="error">{{ $message }}</div> @enderror 
                <input type="email" name="email" id="email" value="{{ old("email") }}" placeholder="john@doe.fr" class="@error("email") error-border @enderror">
            </div>

            <div>
                <div>Nom:</div>
                @error("nom") <div class="error">{{ $message }}</div> @enderror 
                <input type="text" name="nom" id="nom" value="{{ old("nom") }}" placeholder="Doe" class="@error("nom") error-border @enderror">
            </div>

            <div>
                <div>Prenom:</div>
                @error("prenom") <div class="error">{{ $message }}</div> @enderror 
                <input type="text" name="prenom" id="prenom" value="{{ old("prenom") }}" placeholder="John" class="@error("prenom") error-border @enderror">
            </div>

            <div>
                <div>Domiciliation:</div>
                @error("domiciliation") <div class="error">{{ $message }}</div> @enderror 
                <input type="text" name="domiciliation" id="domiciliation" value="{{ old("domiciliation") }}" placeholder="41 rue Romain Marc" class="@error("domiciliation") error-border @enderror">
            </div>

            <div>
                <div>Nom formation:</div>
                @error("id_formation") <div class="error">{{ $message }}</div> @enderror 
                <label for="pet-select">Choose a pet:</label>

                <select name="id_formation">
                    <option value="1">RT</option>
                    <option value="2">MMI</option>
                    <option value="3">GACO</option>
                </select>

            </div>

            <div>
                <div>Groupe:</div>
                @error("groupe") <div class="error">{{ $message }}</div> @enderror 
                <input type="text" name="groupe" id="groupe" value="{{ old("groupe") }}" placeholder="LK" class="@error("groupe") error-border @enderror">
            </div>

            <div>
                <div>Sous Groupe:</div>
                @error("sous_groupe") <div class="error">{{ $message }}</div> @enderror 
                <input type="text" name="sous_groupe" id="sous_groupe" value="{{ old("sous_groupe") }}" placeholder="1" class="@error("sous_groupe") error-border @enderror">
            </div>
            
            <div>
                <div>Mot de passe:</div>
                @error("mot_de_passe") <div class="error">{{ $message }}</div> @enderror 
                <input type="mot_de_passe" name="mot_de_passe" id="mot_de_passe" placeholder="••••••••" class="@error("mot_de_passe") error-border @enderror">
            </div>
            
            <div>
                <div>Confirmation mot de passe:</div>
                @error("mot_de_passe_confirmation") <div class="error">{{ $message }}</div> @enderror 
                <input type="password" name="mot_de_passe_confirmation" id="mot_de_passe_confirmation" placeholder="••••••••" class="@error("mot_de_passe_confirmation") error-border @enderror">
            </div>

            <button>Signup</button>
        </form>
    
    </section>
@endsection