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

                        <label for="">
                            Quand aura lieu ce déplacement ?
                        </label>
                        <input type="datetime-local" name="date" id="">

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
                    <th>nom_equipage</th>
                    <th>date</th>
                    <th>code_postal_départ</th>
                    <th>ville_départ</th>
                    <th>adresse_départ</th>
                    <th>code_postal_arrivé</th>
                    <th>ville_arrivé</th>
                    <th>adresse_arrivé</th>
                  </tr>
                @foreach($tous_les_deplacements_prévus as $deplacement)
                  <tr>
                    <td>{{ $deplacement["nom_equipage"] }}</td>
                    <td>{{ $deplacement["date"] }}</td>
                    <td>{{ $deplacement["code_postal_départ"] }}</td>
                    <td>{{ $deplacement["ville_départ"] }}</td>
                    <td>{{ $deplacement["adresse_départ"] }}</td>
                    <td>{{ $deplacement["code_postal_arrivé"] }}</td>
                    <td>{{ $deplacement["ville_arrivé"] }}</td>
                    <td>{{ $deplacement["adresse_arrivé"] }}</td>
                  </tr>  
              @endforeach
            </table>
          </div>
            


        </div>
    

    </section>
@endsection