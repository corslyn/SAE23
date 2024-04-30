@extends('layout.base')

@section("title", "Équipage")


@section("body")
    <section class="container">

        @if(session() -> has("deleted_vehicule"))
            <script>
                Swal.fire({
                    icon: "success",
                    title: "Terminé",
                    text: "Votre voiture a été supprimée !",
                    showConfirmButton: false,
                    timer: 2000
                });
            </script>
        @endif

        <div class="carre-beige">
            <h1 style="margin: 0; padding: 0;">Équipes</h1>
            
            <div>
                @if(!isset($leader_of_equipe) || $leader_of_equipe -> count() === 0)
                    <p align="center">
                        <b>Vous n'avez pas encore d'équipage, créez-en un:</b>
                    </p>
                    <br>

                    <form action="{{ route("equipage.create") }}" method="POST">
                        @csrf
                        @error("immatriculation") <div class="error">{{ $message }}</div> @enderror 
                        <label>Nom</label>
                        <i class='bx bxs-user-detail'></i>
                        <input type="text" value="{{ old("nom") }}" name="nom" placeholder="Nom de votre équipe" class="@error("nom") error-border @enderror">
                        <button>Créer</button>
                    </form>
                @else
                    <p align="center">
                        <b>Liste des membres de votre équipe:</b>
                        
                        @if(isset($leader_of_equipe))
                        <div class="resultat" style="margin-bottom: 50px; margin-top: 25px;">
                            <br>
                            <table>
                                <tr>
                                    <th>&nbsp;&nbsp;&nbsp;Nom&nbsp;&nbsp;&nbsp;</th>
                                    <th>&nbsp;&nbsp;Email&nbsp;&nbsp;</th>
                                    <th>Formation</th>
                                    <th>&nbsp;Groupe&nbsp;</th>
                                    <th>Exclure</th>

                                </tr>
                                {{-- 
                                    Je recupere l'equipage, de l'equipage grâce a une jointure, je recupère les utilisateurs qui 
                                    ont rejoins    
                                --}}
                                    @foreach($leader_of_equipe -> equipage() -> first() -> joined_users() -> get() as $joined_user)
                                        {{-- Puis de rejoins, je recupère l'utilisateur afin de l'afficher --}}
                                        @php($user = $joined_user -> user() -> first())    
                                        <tr>
                                            <td>{{ $user -> email }}</td>
                                            <td>{{ $user -> nom }}</td>
                                            <td>{{ $user -> formation }}</td>
                                            <td>{{ $user -> sous_groupe }}</td>

                                            <td>
                                                <form class="delete_lieu" action="{{ route("lieux.delete", $joined_user -> id) }}" method="POST">
                                                    @method("DELETE")
                                                    @csrf
                                                    <button>
                                                        <i class='bx bx-trash-alt'></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>  
                                    @endforeach
                                </table>
                            </div>
                        @endif
                        </p>
                @endif
            </div>            
        </div>
        
        <div class="carre-beige">
            <h1 style="margin: 0; padding: 0;">Rejoindre une équipe</h1>
            <p align="center">
                <b>Rejoignez un équipage en entrant son nom ci-dessous:</b>
            </p>
            @error("error_in_equipage_name")
                <div class="error">{{ $message }}</div>
            @enderror
            <form action="{{ route("equipage.join") }}" method="POST">
                @csrf
                @error("immatriculation") <div class="error">{{ $message }}</div> @enderror 
                <label>Nom</label>
                <i class='bx bxs-user-detail'></i>
                <input type="text" value="{{ old("nom") }}" name="nom" placeholder="Nom de votre équipe" class="@error("nom") error-border @enderror">
                <button>Rejoindre</button>
            </form>
        </div>

        <div class="carre-beige" style="margin-bottom: 50px;">
            <h1 style="margin: 0; padding: 0;">Équipe rejointe</h1>
            <p align="center">
                <b>Voici toutes les équipes que vous avez rejoint:</b>
                @if($joined_equipe -> count() !== 0)
                <div class="resultat" style="margin-bottom: 50px; margin-top: 25px;">
                    <table>
                        <br>
                            <tr>
                                <th>Nom de l'équipe</th>
                                <th>Quitter</th>
                            </tr>
                            @foreach($joined_equipe as $equipe)
                                {{-- Puis de rejoins, je recupère l'utilisateur afin de l'afficher --}}
                                <tr>
                                    <td>
                                        {{ $equipe -> equipage() -> first() -> nom_equipage }}
                                    </td>
                                    <td>
                                        <form class="delete_lieu"  method="POST">
                                            @method("DELETE")
                                            @csrf
                                            <button>
                                                <i class='bx bx-log-out-circle'></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>  
                            @endforeach
                    </table>
                </div>
                @endif
            </p>
        </div>
    </section>

@endsection