@extends('layout.base')

@section("title", "Admin")

@section("body")
        <h2>Gérer la base de donnée</h2>
    </div>


    <section class="container">

        <div class="carre-beige">
            @if(session() -> has("output"))
                <div class="success">
                    OUTPUT MESSAGE: {{ session("output") }}
                </div>
            @endif

            <form action="{{ route("auth.admin_actions") }}" method="post">
                @csrf
                <select name="action" id="">
                    <option value="-x">Output la base de donnée sous format JSON</option>
                    <option value="-r">Importer un JSON pour remplacer la DB</option>
                    <option value="-a">Importer un JSON pour ajouter des choses à la DB</option>
                </select>
                <button>Lancer !</button>
            </form>
        </div>
        
    </section>
@endsection

