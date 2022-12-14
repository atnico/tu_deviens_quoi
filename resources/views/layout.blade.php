<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale
<meta http-equiv=" X-UA-Compatible content="ie=edge">
    <title>Application Laravel Crud</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="https://kit.fontawesome.com/f1b49c94fc.js" crossorigin="anonymous"></script>
</head>

<body>

    <!-- <nav class="navbar navbar-expand-lg bg-dark">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
      <a class="navbar-brand mx-auto link-light" href="#">TuDeviensQuoi?</a>
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active link-light" aria-current="page" href="#">Accueil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active link-light" href="#">Quacks</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active link-light" href="#">Explorer</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active link-light" href="#">Notifications</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active link-light" href="">A vous !</a>
        </li>
      </ul>
      <form class="d-flex " role="search">
        <input class="form-control me-2" type="search" placeholder="Recherche Quacks" aria-label="Search">
        <button class="btn btn-outline-success link-light" type="submit">Rechercher</button>
      </form>
    </div>
  </div>
</nav> -->
    <div class="row">
        <div class="col-md-12 mx-auto titre-bienvenue mb-5">
            <h1>Bienvenue sur QUACKS </h1>
        </div>
    </div>
    {{-- <div class="image-accueil">
        <div class="row">
            <img src="/Applications/XAMPP/xamppfiles/htdocs/tu_deviens_quoi/public/images/duck.jpeg" class="rounded mx-auto d-block" alt="...">
        </div>
    </div> --}}
    @if (Auth::user())
        <br>
        <div class="container">
            <div class="row">
                {{-- <div class="col-md-6 ">
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Rechercher Quackers"
                            aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Rechercher</button>
                    </form>
                </div> --}}

                <div class="col-md-6 your-turn">
                </div>
            </div>
    @endif





    <div class="container">
        <div class="row">
            <div class="col-md-3 sidenav mt-5">
                <div class=" sidenav-style fixed-top mt-5 ml-5">
                    <div class="quack-logo">
                        <a href="{{ route('index') }}">Accueil</a>
                    </div><br>
                    @if (!Auth::user())
                        <div class="login">
                            <form method="POST" action="{{ Route('login') }}">
                                <a href="{{ route('login') }}">Connexion</a>
                            </form>
                        </div><br>
                        <div>
                            <a href="{{ route('register') }}">Inscription</a>
                        </div><br>
                    @endif

                    @if (Auth::user())
                        <div>
                            <a href="{{ route('quacks.create') }}">Cr??er un message</a>
                        </div><br>
                        <div>
                            <a href="{{ route('profil', Auth::user()) }}">Profil</a>
                        </div><br>
                        <div>
                            <a href="{{ Route('profile.update') }}">Mon compte</a>
                        </div><br>


                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-responsive-nav-link :href="route('logout')"
                                onclick="event.preventDefault();
                                      this.closest('form').submit();">
                                {{ __('Deconnexion') }}
                            </x-responsive-nav-link>
                        </form>
                    @endif
                </div>
            </div>
            <div class="col-md-9 affichage-quacks">
                @yield('content')
            </div>
        </div>



        {{-- <div class="col-md-3 quackers-connecte">
                      <h2>Quackers connect??s</h2>
                  </div> --}}
        {{-- </div>
                <div class="sticky-bottom message">
                  <button type="button" class="btn btn-light">Messages</button>
                </div>
        </div> --}}





        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
        </script>
</body>

</html>
