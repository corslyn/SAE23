@extends('layout.base')

@section("title", "Profil")

@section('body')
        <h2>Modifiez vos paramètres de profil</h2>
    </div>

    <section class="container">
        <form action="{{route("profile.form")}}" method="POST">
            @csrf
            <label>Nom</label>
            <input type="text" placeholder="Nom" name="nom" value="{{ session("nom") }}">
            <label>Email</label>
            <input type="email" placeholder="Email" name="email" value="{{ session("email") }}">
            <label>Mot de passe</label>
            <input type="password" placeholder="Mot de passe" name="password">
            <label>Confirmation du mot de passe</label>
            <input type="password" placeholder="Mot de passe confirmation" name="password-confirm">
            <label>Formation</label>
            <input type="text" value="RT1" name="formation">
            <label>Sous groupe</label>
            <select name="sous_groupe">
                <option value="LK1">LK1</option>
                <option value="LK2">LK2</option>
                <option value="GB1">GB1</option>
                <option value="GB2">GB2</option>
            </select>
            <button>Modifier !</button>
        </form>
    </section>

@endsection