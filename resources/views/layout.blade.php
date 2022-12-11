<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale
<meta http-equiv=" X-UA-Compatible content="ie=edge">
    <title>Application Laravel Crud</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
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


    <div class="container">
        @yield('content')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>