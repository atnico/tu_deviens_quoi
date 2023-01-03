@extends('layout')

@section('content')
    <div class="card text-bg-light mx-auto add-quack" style="max-width: 40rem;">
        <div class="card-header">
            <div class="card mx-auto mt-5 mb-5" style="width: 10rem;">
                <img src="{{ url('/images/user.png') }}" class="card-img-top" alt="..." width="20px">
            </div>
            <div class="mt-5 mb-5 mx-auto auth-admin" style="width: 18rem;">
                @if (Auth::user())
                <h3 class="text-secondary">{{ Auth::user()->firstName }}</h3>
            @endif
        </div>
        <h2>Ajouter un message</h2>
        </div>
        <div class="card-body">
            <!-- Formulaire -->
            <form method="post" action="{{ route('quacks.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Message</label>
                    <textarea name="content" cols="30" rows="10" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label>Image</label>
                    <input type="file" name="image" class="form-control">
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label><span class="hidden-xs">Tags</span></label>
                            <div class="input-group">
                                <input type="string" name="tags" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary rounded-pill shadow-sm mt-3 mb-3">
                    Ajouter un message </button>
            </form>
            <!-- Fin du formulaire -->

        </div>
    </div>
@endsection
