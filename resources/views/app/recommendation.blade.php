@extends('layout.base')

@section("title", "Recommendation")

@section("body")
        <h2>Visualiser tous les déplacements qui pourraient vous intéresser</h2>
    </div>
    <section class="container">
        
        <h2 style="margin: 20px;">Vos lieux: </h2>
        <div class="resultat" style="margin-bottom: 50px;">
          <br>
          <table>
              <tr>
                <th>Équipage <br> <span style="color: grey; font-style: italic; font-size: 15px;">(cliquez pour rejoindre)</span></th>
                <th>Date</th>
                <th>Voyage</th>
                <th>Durée (min)</th>
              </tr>

              
            @foreach($related_places as $lieu)
              <tr>
                <td>
                  <a href="{{route("equipage.join") . "?nom=" . $lieu["nom_equipage"]}}">
                    {{ $lieu["nom_equipage"] }}
                  </a>
                </td>
                <td>{{ Carbon\Carbon::parse($lieu["date"]) -> diffForHumans() }}</td>
                <td>{{ $lieu["ville"] . ", " . $lieu["code_postal"] . "  - " . $lieu["adresse"] }}</td>
                <td>{{ $lieu["duree"] }}</td>
              </tr>  
            @endforeach
        </table>
      </div>

    </section>
@endsection

