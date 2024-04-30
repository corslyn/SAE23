@extends('layout.base')

@section("title", "Véhicule")


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

        @if($has_vehicle)
        <div class="carre-beige">
            <h1 style="margin: 0; padding: 0;">Véhicule</h1>
            
            <p align="center">
                    <b>Vous avez déjà un véhicule dont voici les informations:</b>
                </p>
                <br>
                <div class="delete-car">
                    <div>
                        Immatriculation: {{ $vehicule -> immatriculation }} <br>
                        Nombre de place: {{ $vehicule -> nombre_places }}
                    </div>

                    <script>
                        function delete_form(e) {
                            e.preventDefault()

                            Swal.fire({
                                title: "En êtes vous sûr ?",
                                showCancelButton: true,
                                confirmButtonText: "Supprimer",
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    e.target.submit()
                                    return true;
                                }  else {
                                    return false;
                                }
                            });
                        }
                    </script>

                    <form action="{{ route("vehicule.delete", $vehicule -> id) }}" onsubmit="return delete_form(event)" method="POST">
                            @csrf
                            @method("DELETE")
                            <button>
                                <i class='bx bx-trash-alt'></i>
                            </button>
                    </form>


                </div>
            
            @else
                <p align="center">
                    Vous n'avez pas encore ajouter de véhicule, veuillez en ajouter un avec le formulaire ci-dessous
                </p>
                <br>

                <form action="{{ route("vehicule.create") }}" method="POST">
                    @csrf
                    @error("immatriculation") <div class="error">{{ $message }}</div> @enderror 
                    <label>Immatriculation</label>
                    <i class='bx bx-credit-card-front' ></i>
                    <input type="text" value="{{ old("immatriculation") }}" name="immatriculation" placeholder="XX-XXX-XX" class="@error("immatriculation") error-border @enderror">
                    
                    @error("nombre_places") <div class="error">{{ $message }}</div> @enderror 
                    <label>Nombre de place</label>
                    <i class='bx bx-car'></i>
                    <input type="text" value="{{ old("nombre_places") }}" name="nombre_places" placeholder="4" class="@error("nombre_places") error-border @enderror">
                
                    <button>Soumettre</button>
                </form>
            @endif
        </div>
    </section>

@endsection