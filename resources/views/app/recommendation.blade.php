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
                  <th>Adresse</th>
              </tr>
            @foreach($related_places as $lieu)
                <td>{{ $lieu -> adresse }} </td>
                <td>{{ $lieu -> code_postal }} </td>
                <td>{{ $lieu -> ville }} </td>
                <td>{{ $lieu -> id_utilisateur }} </td>
          @endforeach
        </table>
      </div>

    </section>
@endsection

