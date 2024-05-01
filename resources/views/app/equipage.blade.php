@extends('layout.base')

@section("title", "Équipage")

@section("body")
        <h2>Créez une équipe, rejoignez une équipe, affichez les équipes rejointes</h2>
    </div>
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
            <h1 style="margin: 0; padding: 0;">Rejoindre une équipe</h1>
            <p align="center">
                <b>Rejoignez un équipage en entrant son nom ci-dessous:</b>
            </p>
            @error("error_in_equipage_name")
                <div class="error">{{ $message }}</div>
                <script>
                    Swal.fire({
                        icon: "error",
                        title: "Erreur",
                        text: "{{ $message }}",
                        showConfirmButton: false,
                        timer: 2000
                    });
                </script>
            @enderror
            <form action="{{ route("equipage.join") }}" method="GET">
               
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
                @error("pas_quitter")
                    <script>
                        Swal.fire({
                            icon: "error",
                            title: "Erreur",
                            text: "{{ $message }}",
                            showConfirmButton: false,
                            timer: 2000
                        });
                    </script>
                    <div class="error">{{ $message }}</div>
                @enderror
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
                                        <form class="delete_lieu" method="POST" action="{{ route("equipage.quit", $equipe -> id) }}">
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
                        @error("pas_de_tuturette") 
                            <script>
                                Swal.fire({
                                    icon: "error",
                                    title: "Erreur",
                                    text: "{{ $message }}",
                                    showConfirmButton: false,
                                    timer: 2000
                                });
                            </script>
                            <div class="error">{{ $message }}</div>     
                        @enderror 
                    
                        <label>Nom</label>
                        <i class='bx bxs-user-detail'></i>
                        <input type="text" value="{{ old("nom_equipage") }}" name="nom_equipage" placeholder="Nom de votre équipe" class="@error("nom_equipage") error-border @enderror">
                        <button>Créer</button>
                    </form>
                @else
                    <p align="center">
                        <b>Liste des membres de votre équipe:</b>
                        @error("pas_kick") 
                            <div class="error">{{ $message }}</div> 
                            <script>
                                Swal.fire({
                                    icon: "error",
                                    title: "Erreur",
                                    text: "{{ $message }}",
                                    showConfirmButton: false,
                                    timer: 2000
                                });
                            </script>    
                        @enderror 
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
                                    @php($my_equipage = $leader_of_equipe -> equipage() -> first())
                                    @foreach($my_equipage -> joined_users() -> get() as $joined_user)
                                        {{-- Puis de rejoins, je recupère l'utilisateur afin de l'afficher --}}
                                        @php($user = $joined_user -> user() -> first())    
                                        <tr>
                                            <td>{{ $user -> email }}</td>
                                            <td>{{ $user -> nom }}</td>
                                            <td>{{ $user -> formation }}</td>
                                            <td>{{ $user -> sous_groupe }}</td>

                                            <td>
                                                <form class="delete_lieu" action="{{ route("equipage.delete", $joined_user -> id) }}" method="POST">
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
                            <h1>
                                Inviter quelqu'un dans votre équipe !
                            </h1>
                            <div>
                                Pour inviter quelqu'un a rejoindre votre équipe, envoyez lui ce lien: <a>{{route("equipage.join") . "?nom=" . $my_equipage -> nom_equipage}}</a>
                            </div>
                        @endif
                        </p>
                @endif
            </div>            
        </div>
    </section>

@endsection