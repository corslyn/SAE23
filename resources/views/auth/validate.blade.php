@extends('layout.base')

@section("body")
    <section class="container">
        <h1 style="color: #ffffff;">Merci de valider votre compte</h1>
        <p>Vous etes prié de sécuriser votre compte en utilisant la 2FA</p>
        <p>
            Scannez l'image suivante avec votre authenticator préferé (FreeOTP, Aegis, Google Authenticator, Authly ...):
        </p>
        <img src="{{ $qrcode }}">
        <p>
            Ou entrez le secret suivant: {{ $secret }}
        </p>
        <div>
            Une fois cela fait, rendez-vous sur la page de <a style="color: black;" href="{{ route("auth.login") }}">login</a>, et utiliser le code à 6 chiffres dans l'input "Code".
        </div>
    </section>
@endsection
