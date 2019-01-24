<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BDE Strasbourg</title>
    <link rel="icon" type="image/png" href="/image/logobde.png" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/"
        crossorigin="anonymous">
    <link rel="stylesheet" href="/css/materialize.css">
    <link rel="stylesheet" href="/css/app.css">
    <script src="/js/jquery.js"></script>
    <script src="/js/materialize.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.1.0/cookieconsent.min.css"
    />
    <script src="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.1.0/cookieconsent.min.js"></script>
    {{-- Popup cookie appear only once when someone connect to the server --}}
    <script>
        window.addEventListener("load", function(){
        window.cookieconsent.initialise({
            "palette": {
                "popup": {
                    "background": "#000"
                },
                "button": {
                    "background": "#ffc252"
                }
            },
            "showLink": false,
            "theme": "classic",
            "position": "top",
            "content": {
                "message": "Nous utilisons les cookies afin de fournir les services et fonctionnalités proposés sur notre site. En cliquant sur ”J’accepte”, vous acceptez l’utilisation des cookies.",
                "dismiss": "J’accepte"
            }
        })});   
    </script>
</head>

<body>
    @include('layout.navbar') @yield('content') @yield('scripts')
    @include('layout.footer')
</body>

</html>