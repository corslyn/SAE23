@extends('layout.base')

@section("title", "Déplacement")


@section("body")
        <h2>Organiser des déplacements avec votre équipage, visualiser les déplacements des équipages que vous avez rejoints</h2>
    </div>
    <section class="container">

        @if($user_own_team)
            <div class="carre-beige">
                <h1 style="margin: 0; padding: 0;">Organiser des déplacements avec votre équipe</h1>
                <div>
                    <form action="{{ route("deplacement.create") }}" method="post">
                        @csrf
                        @error("deplacement_depart") <div class="error">{{$message}}</div> @enderror
                        <label for="">
                            D'où souhaitez-vous organiser le déplacement ?
                        </label>
                        <select name="deplacement_depart">
                            @foreach($depart  as $lieu)
                                <option value="{{ $lieu -> id }}">
                                    {{ 
                                        $lieu -> ville . ", " .  
                                        $lieu -> code_postal . ", " .  
                                        $lieu -> adresse 
                                    }}
                                </option>
                            @endforeach
                        </select>

                        @error("deplacement") <div class="error">{{$message}}</div> @enderror
                        <label for="">
                            Vers où souhaitez-vous organiser le déplacement ?
                        </label>
                        <select name="deplacement">
                            @foreach($arrive as $lieu)
                                <option value="{{ $lieu -> id }}">
                                    {{ 
                                        $lieu -> ville . ", " .  
                                        $lieu -> code_postal . ", " .  
                                        $lieu -> adresse 
                                    }}
                                </option>
                            @endforeach
                        </select>

                        @error("date") <div class="error">{{$message}}</div> @enderror
                        <label for="">
                            Quand aura lieu ce déplacement ?
                        </label>
                        <input type="datetime-local" name="date" id="">

                        @error("duree") <div class="error">{{$message}}</div> @enderror
                        <label for="">
                            Combien de temps durera-t-il ? (en minutes)
                        </label>
                        <input type="number" name="duree" id="">


                        <button>Organiser le déplacement</button>
                    </form>

                </div>
            </div>
        @endif

        <div class="carre-beige">
            <h1 style="margin: 20px;">Visualiser les déplacements prévus </h1>
            <div class="resultat" style="margin-bottom: 50px;">
              <br>
              <table>
                <tr>
                    <th>Équipage</th>
                    <th>Date</th>
                    <th>Ville départ</th>
                    <th>Ville d'arrivée</th>
                    <th>Durée (min)</th>
                </tr>
                @foreach($tous_les_deplacements_prévus as $deplacement)
                    <tr>
                        <td>{{ $deplacement["nom_equipage"] }}</td>
                        <td>{{ Carbon\Carbon::parse($deplacement["date"]) -> diffForHumans() }}</td>
                        <td>{{ $deplacement["ville_départ"] . ", " . $deplacement["code_postal_départ"] . "  - " . $deplacement["adresse_départ"] }}</td>
                        <td>{{ $deplacement["ville_arrivé"] . ", " . $deplacement["code_postal_arrivé"] . "  - " . $deplacement["adresse_arrivé"]}}</td>

                        <td>{{ $deplacement["duree"] }} min</td>
                    </tr>  
              @endforeach
            </table>
          </div>
            


        </div>
    

    </section>
@endsection