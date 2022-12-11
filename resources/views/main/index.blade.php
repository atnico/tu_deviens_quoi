@extends('layout')

@section('content')

@if (Auth::user())
<h3>Bonjour {{Auth::user()->firstName}}</h3>
@endif

<br>
<div class="container">
    <div class="row">
        <div class="col-md-3 ">
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Rechercher Quackers" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Rechercher</button>
            </form>
        </div>
        <div class="col-md-6 ">
            <textarea class="form-control" placeholder="Avous de jouer" id="floatingTextarea2" style="height: 100px"></textarea>
            <label for="floatingTextarea2">A vous de Quacker</label>
        </div>
        <div class="col-md-3">
            <div class="form-floating">

                <select class="form-select" aria-label="Default select example">
                    <option selected>Top 3 des Quacks</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
            </div>
        </div>
    </div>
</div>
<br>

<div class="container">
    <div class="row">
        <div class="col-md-2 sidenav">
            <div class="quack-logo">
                <a href="#">Accueil</a>
            </div><br>
            <div>
                <a href="#">Explorer</a>
            </div><br>
            @if (Auth::user())
            <div>
                <a href="#">Notifications</a>
            </div><br>
           
            <div>
                <a href="#">Messages</a>
            </div><br>
            <div>
                <a href="#">Signets</a>
            </div><br>
            <div>
                <a href="#">Listes</a>
            </div><br>
            <div>
                <a href="#">Profil</a>
            </div>
            @endif
        </div>
        <div class="col-md-7 carte">
            @foreach($quacks as $quack)
            <div class="border border-primary m-3 quack-card">
                <div class="row g-0 bg-light position-relative">
                    <div class="col-md-6 mb-md-0 p-md-4">
                        <img src="{{asset('storage/uploads/' . $quack->image)}}" width="100%">
                    </div>
                    <div class="col-md-6 quack-content">
                        {{$quack->content}}
                        <br>
                        <span>{{$quack->tags}}</span>
                        <br>

                        @if (Auth::user())
                        <a href="{{ route('comments.createComment', $quack->id)}}" class="stretched-link">Ajouter un commentaire</a>

                        @endif


                    </div>
                </div>

                @foreach($comments as $comment) @if ($comment->quack_id == $quack->id)
                <div class="row g-0 bg-secondary position-relative">
                    <div class="col-md-6 mb-md-0 p-md-4">
                        <img src="{{asset('storage/uploads/' . $comment->image)}}" width="100%">
                    </div>
                    <div class="col-md-6 p-4 ps-md-0">
                        {{$comment->content}}
                        <br>
                        <span>{{$comment->tags}}</span>
                        <br>
                    </div>
                </div>
                @endif @endforeach
            </div>
            @endforeach
        </div>
        <div class="col-md-3 quackers-connecte">
            <h2>Quackers connectés</h2>
        </div>
    </div>
    <div class="sticky-bottom message"><button type="button" class="btn btn-light">Messages</button></div>
</div>





@endsection