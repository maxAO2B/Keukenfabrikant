<!doctype html>
<html lang="en">
<head class="head">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/fontawesome-all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootadmin.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/panel.css') }}" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/642ec4bc32.js" crossorigin="anonymous"></script>
    <title>panel</title>
    <link rel="icon" type="image/png" href="/storage/icon.png">
</head>
<body class="bg-light">

<nav class="navbar navbar-expand navbar-dark bg-primary">
    <a class="navbar-brand" href="../home">Beheerders Paneel</a>
</nav>

<div class="d-flex">
    <div class="sidebar sidebar-dark bg-dark">
        <ul class="list-unstyled">
            <li><a href="../home" class="margin">Home</a></li>
            <li><a href="{{ url('/admin/users') }}" class="margin">Gebruikers</a></li>
            <li><a href="{{ url('/admin/posts') }}" class="margin">Posts</a></li>
            <li><a href="{{ url('/admin/FAQ') }}" class="margin">FAQ</a></li>
            <li><a href="{{ url('/admin/keukens')}}" class="margin">Keukenzaken</a></li>
        <li><a href="{{url('/admin/aanvragen')}}" class="margin">Aanvragen</a></li>
            <li><a href="{{url('/admin/links')}}" class="margin">Links</a></li>
        </ul>
    </div>
        <main class="main">
            @yield('content')
        </main>
</div>
</body>
</html>