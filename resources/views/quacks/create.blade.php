@extends('layout')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-lg-7 mx-auto">
            <div class="bg-white rounded-lg shadow-sm p-5">
                <div class="tab-content">
                    <div id="nav-tab-card" class="tab-pane fade show active">
                        <h3> Ajouter un quack</h3>
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <!-- Formulaire -->
                        <form method="POST" action="{{ route('quacks.store') }}">
                            @csrf
                            <div class="form-group">
                                <label>Content</label>
                                <input type="text" name="content" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Image</label>
                                <input type="string" name="image" class="form-control">
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
                            <button type="submit" class="btn btn-primary rounded-pill shadow-sm">
                                Ajouter un quack </button>
                        </form>
                        <!-- Fin du formulaire -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection