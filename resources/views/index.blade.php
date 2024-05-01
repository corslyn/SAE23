@extends('layout.base-index')

@section("body")

        <div class="banner3">
            <form action="{{ route("app.search") }}" method="GET" style="background-color: inherit;">
                <div class="search-bar">
                    <input name="depart" value="{{ isset($_GET["depart"]) ? $_GET["depart"] : "" }}" class="search-input" type="text" id="departure" class="search-input" placeholder="Lieu de départ">
                    <input name="arrive" value="{{ isset($_GET["arrive"]) ? $_GET["arrive"] : "" }}" class="search-input" type="text" id="destination" class="search-input" placeholder="Lieu d'arrivée">
                    <input name="date"  value="{{ isset($_GET["date"]) ? $_GET["date"] : "" }}" type="datetime-local" id="date" class="search-input" placeholder="Date">
                    <button type="submit" class="search-button" style="margin-top: 0px; width: 60px;"><i class='bx bx-search-alt-2'></i></button>
                </div>
            </form>

        </div>
        @if(isset($tous_les_voyages) && $tous_les_voyages -> count() !== 0)
            <div class="resultat">
                <br>
                <table>
                    <tr>
                        <th>Équipage <br> <span style="color: grey; font-style: italic; font-size: 15px;">(cliquez pour rejoindre)</span></th>
                        <th>Date</th>
                        <th>Départ</th>
                        <th>Arrivée</th>
                        <th>Durée (min)</th>
                    </tr>

                    @foreach($tous_les_voyages as $deplacement)
                        <tr>
                            <td>
                                <a href="{{route("equipage.join") . "?nom=" . $deplacement["nom_equipage"]}}">
                                    {{ $deplacement["nom_equipage"] }}
                                </a>
                            </td>
                            <td>{{ Carbon\Carbon::parse($deplacement["date"]) -> diffForHumans() }}</td>
                            <td>{{ $deplacement["ville_départ"] . ", " . $deplacement["code_postal_départ"] . "  - " . $deplacement["adresse_départ"] }}</td>
                            <td>{{ $deplacement["ville_arrivé"] . ", " . $deplacement["code_postal_arrivé"] . "  - " . $deplacement["adresse_arrivé"]}}</td>

                            <td>{{ $deplacement["duree"] }} min</td>
                        </tr>  
                    @endforeach
                </table>
                <br>
            </div>
        @endif

@endsection