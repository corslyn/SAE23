<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>@yield("title", config("app.name"))</title>

        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        
        {{-- Uncomment this line if you prefer to use bootstrap icons --}}
        {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"> --}}
        
        <link rel="stylesheet" href="/assets/css/style.min.css">

        <link rel="icon" type="image/png" href="/assets/img/logosite.png">
        
        <script src="/assets/js/app.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </head>

    <body>
        @include("layout.header")
        
        <div class="banner2">
            <h1>FCSMobilité</h1>


        @yield("body")
    </body>

</html>