@extends('layout.base-index')

@section("body")

        <div class="banner3">
            <form action="/search" method="GET" style="background-color: inherit;">
                <div class="search-bar">
                    <input name="depart" class="search-input" type="text" id="departure" class="search-input" placeholder="Lieu de départ" required>
                    <input name="arrive" class="search-input" type="text" id="destination" class="search-input" placeholder="Lieu d'arrivée" required>
                    <input name="date" type="date" id="date" class="search-input" placeholder="Date" required>
                    <button type="submit" class="search-button" style="margin-top: 0px; width: 60px;"><i class='bx bx-search-alt-2'></i></button>
                </div>
            </form>

        </div>
        <div class="resultat">
          <br><table>
            <tr>
                <th>Equipage</th>
                <th>Lieux de départ</th>
                <th>Arrivée</th>
                <th>Temps estimé</th>
                <th>Date</th>
            </tr>
            <tr>
                <td>Bing chilling</td>
                <td>Montbéliard</td>
                <td>Belfort</td>
                <td>30/04/2024</td>
                <td>45 minutes</td>
            </tr>
        </table><br>
        </div>

@endsection