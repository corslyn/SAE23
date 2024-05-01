@extends('layout.base')

@section("title", "S'inscrire")


@section("body")

    <section class="container login">
        
        <form action="{{ route("auth.signup") }}" method="post">
            <h1>S'inscrire</h1>
            @csrf
            <div>
                <label>Email</label>
                @error("email") <div class="error">{{ $message }}</div> @enderror 
                <i class='bx bx-envelope'></i>
                <input type="email" name="email" id="email" value="{{ old("email") }}" placeholder="john@doe.fr" class="@error("email") error-border @enderror">
            </div>

            <div>
                <label>Nom</label>
                @error("nom") <div class="error">{{ $message }}</div> @enderror 
                <i class='bx bx-user-plus' ></i>
                <input type="text" name="nom" id="nom" value="{{ old("nom") }}" placeholder="Doe" class="@error("nom") error-border @enderror">
            </div>


            <div>
                <label>Nom formation</label>
                @error("formation") <div class="error">{{ $message }}</div> @enderror 
                
                <i class='bx bxs-school' ></i>
                <select name="formation">
                    <option value="RT1">RT1</option>
                </select>

            </div>

            <div>
                <label>Sous Groupe</label>
                @error("sous_groupe") <div class="error">{{ $message }}</div> @enderror 
                <i class='bx bxs-graduation' ></i>
                <select name="sous_groupe">
                    <option value="LK1">LK1</option>
                    <option value="LK2">LK2</option>
                    <option value="GB1">GB1</option>
                    <option value="GB2">GB2</option>
                </select>
            </div>
            
            <div>
                <label>Mot de passe</label>
                @error("mot_de_passe") <div class="error">{{ $message }}</div> @enderror 
                <i class='bx bx-lock-alt'></i>
                <input type="password" name="mot_de_passe" id="mot_de_passe" placeholder="••••••••" class="@error("mot_de_passe") error-border @enderror">
            </div>
            
            <div>
                <label>Confirmation mot de passe</label>
                @error("mot_de_passe_confirmation") <div class="error">{{ $message }}</div> @enderror 
                <i class='bx bx-lock-alt'></i>
                <input type="password" name="mot_de_passe_confirmation" id="mot_de_passe_confirmation" placeholder="••••••••" class="@error("mot_de_passe_confirmation") error-border @enderror">
            </div>

            <div style="margin-top: 20px;">
                <label style='display: inline;'>Utiliser l'A2F (TOTP) ? </label>
                <input style="width: 40px;" type="checkbox" name="a2f">
            </div>
            <button>S'inscrire</button>
        </form>
    
    </section>
@endsection