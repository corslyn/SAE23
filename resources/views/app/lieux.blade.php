@extends('layout.base')

@section("title", "Lieux")

@section("body")
        <h2>Ajoutez votre domicile, le lieu ou vous travaillez, et le lieu ou vous pouvez amenez les autres en covoiturage</h2>
    </div>
    <section class="container">
        
        <div class="banner3">
            <div class="container2">
              <form action="{{ route("lieux.create") }}" method="post">
                  @csrf
                  @error("error")
                    <div class="error">
                        {{ $message }}
                    </div>
                  @enderror

                  @if(session() -> has("success"))
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

                  <div class="form-group">
                    @error("adresse") <div class="error">{{ $message }}</div> @enderror 
                    <label for="adresse"><a>Entrer une adresse</a></label>
                    <input type="text" id="adresse" name="adresse" value="{{ old("adresse") }}" placeholder=" 10 rue Charles de Gaule">
                  </div>
                  <div class="form-group">
                    @error("ville") <div class="error">{{ $message }}</div> @enderror 
                    <label for="ville">Entrer le nom de la ville</label>
                    <input type="text" id="ville" for="ville" name="ville" value="{{ old("ville") }}" placeholder=" Paris">
                  </div>
                  <div class=form-group>
                    @error("postal") <div class="error">{{ $message }}</div> @enderror 
                    <label for="text">Entrer le code postal</label>
                    <input type="text" id="postal" name="postal" placeholder=" 75000" value="{{ old("postal") }}">
                    </div>
                    {{-- Si on a pas déja set un domicile principale, on n'afficge pas la checkbox --}}
                    @if(!$already_have_domicile)
                        <div class="form-group">
                            Est-ce que c'est votre domicile ? <input style="width: 45px; margin-top: 40px;" type="checkbox" id="checkbox" name="checkbox">
                        </div>
                    @endif

                    @if(!$already_have_travail)
                        <div class="form-group">
                            Est-ce que c'est votre lieu de travail ? <input style="width: 45px; margin-top: 40px;" type="checkbox" id="checkbox" name="checkbox_travail">
                        </div>
                    @endif

                    @if($already_have_travail || $already_have_domicile)
                        <p style="color: gray; font-style: italic;">Si ce n'est ni votre lieu de domicile, ni votre lieu de travail, alors ce lieu est un lieu de destination que vous prendrez en charge avec votre voiture.</p>
                    @endif
                    <button type="submit">Envoyer <i class='bx bx-send' ></i></button>
                </form>
              </div>
          </div> 
          @if($lieux -> count() >= 1)
          <h2 style="margin: 20px;">Vos lieux: </h2>
          <div class="resultat" style="margin-bottom: 50px;">
            <br>
            <table>
                <tr>
                    <th>&nbsp;&nbsp;&nbsp;Adresse&nbsp;&nbsp;&nbsp;</th>
                    <th>&nbsp;&nbsp;&nbsp;Code postal&nbsp;&nbsp;&nbsp;</th>
                    <th>&nbsp;&nbsp;&nbsp;Ville&nbsp;&nbsp;&nbsp;</th>
                    <th>Domicilié <br> ici ?</th>
                    <th>Travail <br> ici ?</th>
                    <th>
                            Lieu que <br>
                        vous prenez<br>
                        en charge ?
                    </th>
                    <th>Supprimer</th>
                </tr>
              @foreach($lieux as $lieu)
                <tr>
                    <td>{{ $lieu -> adresse}}</td>
                    <td>{{ $lieu -> code_postal}}</td>
                    <td>{{ $lieu -> ville}}</td>
                    <td>
                        @if($lieu -> est_domicile)
                            <p class="success">Oui</p>
                        @else
                            <p class="error">Non</p>
                        @endif
                    </td>
                    <td>
                        @if($lieu -> est_travail)
                            <p class="success">Oui</p>
                        @else
                            <p class="error">Non</p>
                        @endif
                    </td>

                    <td>
                        @if(!($lieu -> est_travail || $lieu -> est_domicile))
                            <p class="success">Oui</p>
                        @else
                            <p class="error">Non</p>
                        @endif
                    </td>
                    <td>
                        <form class="delete_lieu" action="{{ route("lieux.delete", $lieu -> id) }}" method="POST">
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
        <div class="margin-bottom: 25px;">

        </div>
    </section>
@endsection

