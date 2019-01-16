<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BDE Strasbourg</title>
    <link rel="stylesheet" href="/css/materialize.css">
    <link rel="stylesheet" href="/css/app.css">
    <script src="/js/jquery.js"></script>
    <script src="/js/materialize.js"></script>
</head>
<body>
    @include('layout.navbar')

    @yield('content')
    @yield('scripts')
    @include('layout.footer')
</body>
</html>