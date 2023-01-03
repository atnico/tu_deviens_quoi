@extends('layout')

@section('content')
    @if (Auth::user())
        <h3>Bonjour {{ Auth::user()->pseudo }}</h3>
    @endif

    <br>

    {{-- <div class="col-md-3">
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
<br> --}}



    {{-- <div class="container">
    <div class="row">
        <div class="col-md-2 sidenav">
            <div class="quack-logo">
                <a href="{{ route('index')}}">Accueil</a>
            </div><br>
            <div class="login">
                <form method="POST" action="{{ Route('login')}}">
                    <a href="{{ route('login')}}">Login</a>
                </form>
            </div><br>

            <div>
                <a href="#">Explorer</a>
            </div><br>
            @if (Auth::user())
            <div>
                <a href="#">Notifications</a>
            </div><br>

            <div>
                <a href="{{ route('quacks.create')}}">Messages</a>
            </div><br>
            <div>
                <a href="{{ route('profil', Auth::user())}}">Profile</a>
            </div><br>
            <div>
                <a href="{{ Route('profile.update')}}">Mon compte</a>
            </div><br>

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault();
                                        this.closest('form').submit();">
                    {{ __('Log Out') }}
                </x-responsive-nav-link>
            </form>
            @endif
        </div> --}}

    @if (Auth::user())
        <div class="col-md-9 carte">
            @foreach ($quacks as $quack)
                <div class="border border-primary m-3 quack-card">
                    <div class="row g-0 bg-light position-relative">
                        <div class="col-md-6 mb-md-0 p-md-4">
                            <img src="{{ asset('storage/uploads/' . $quack->image) }}" width="100%">
                        </div>
                        <div class="col-md-6 quack-content">
                            {{ $quack->content }}
                            <br>
                            <span>{{ $quack->tags }}</span>
                            <br>
                            <span>Le {{ $quack->created_at->format('d/m/Y') }} à
                                {{ $quack->created_at->format('H:i:s') }}</span>
                            <br>

                            @if (Auth::user())
                                <a href="{{ route('comments.createComment', $quack->id) }}" class="stretched-link">Ajouter un
                                    commentaire</a>
                            @endif


                        </div>
                    </div>
                    


                    @foreach ($comments as $comment)
                        @if ($comment->quack_id == $quack->id)
                            <div class="row g-0 bg-secondary position-relative">
                                <div class="col-md-6 mb-md-0 p-md-4">
                                    <img src="{{ asset('storage/uploads/' . $comment->image) }}" width="100%">
                                </div>
                                <div class="col-md-6 p-4 ps-md-0">
                                    {{ $comment->content }}
                                    <br>
                                    <span>Le {{ $quack->created_at->format('d/m/Y') }} à
                                        {{ $quack->created_at->format('H:i:s') }}</span>
                                    <br>
                                    <span>{{ $comment->tags }}</span>
                                    <br>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            @endforeach
        </div>
        {{-- <div class="col-md-3 quackers-connecte">
            <h2>Quackers connectés</h2>
        </div> --}}
        </div>
        @if (Auth::user())
            <div class="sticky-bottom message">
                <button type="button" class="btn btn-light"><a href="{{ route('quacks.create') }}">Messages</a></button>
            </div>
        @endif
        </div>
    @endif
@endsection
