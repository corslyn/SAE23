@extends('layout.base')

@section("title", "Emploi du temps")

@section("body")
        <h2>Roulez, Partagez, Économisez : Votre solution de covoiturage facile et écologique !</h2>
    </div>
    <section class="container">
        
        <h1 style="padding-top: 10px; margin: 0px !important;" align="center">Emploi du temps</h1>
        
        <div id="edt">
            <div class="horaires">
                <p>8h</p> 
                <p>9h30</p> 
                <p>11h00</p> 
                <p>12h30</p> 
                <p>13h30</p> 
                <p>15h00</p> 
                <p>16h30</p> 
                <p>18h00</p>
            </div>
            <div class="edt-container">
                
                <div class="jour" style="border-left: 3px solid var(--fg-blue-clear);">
                    <div>Lundi</div>

                    <div>
                        {{ $emploidutemps -> l_debut }}
                        {{ $emploidutemps -> l_fin }}
                    </div>

                </div>
            
                <div class="jour">
                    <div>Mardi</div>

                    <div>
                        {{ $emploidutemps -> m_debut }}
                        {{ $emploidutemps -> m_fin }}
                    </div>
                </div>
                <div class="jour">
                    <div>Mercredi</div>

                    <div>
                        {{ $emploidutemps -> me_debut }}
                        {{ $emploidutemps -> me_fin }}
                    </div>
                </div>
                <div class="jour">
                    <div>Jeudi</div>

                    <div>
                        {{ $emploidutemps -> j_debut }}
                        {{ $emploidutemps -> j_fin }}
                    </div>
                </div>
                <div class="jour" style="border-right: 0px solid var(--fg-blue-clear);">
                    <div>Vendredi</div>

                    <div>
                        {{ $emploidutemps -> v_debut }}
                        {{ $emploidutemps -> v_fin }}
                    </div>
                </div>
                <div class="jour" style="border-right: 0px solid var(--fg-blue-clear);">
                    <div>Samedi</div>

                    <div>
                        {{ $emploidutemps -> s_debut }}
                        {{ $emploidutemps -> s_fin }}
                    </div>
                </div>
        </div>
        </div>

    </section>
@endsection