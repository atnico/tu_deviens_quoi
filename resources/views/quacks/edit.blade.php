@extends('layout')

@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-7 mx-auto">
                <div class="bg-white rounded-lg shadow-sm p-5">
                    <div class="tab-content">
                        <div id="nav-tab-card" class="tab-pane fade show active">
                            <h3>Editer un quack</h3>
                            <!-- Message d'information -->
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
                            <form method="POST" action="{{ route('quacks.update', $quack) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label>Content</label>
                                    <textarea name="content" class="form-control" cols="30" rows="10" class="form-control" placeholder="{{ $quack->content }}" value="{{ $quack->content }}"></textarea>

                                </div>
                                <div class="form-group">
                                    <label>Image</label>
                                    <input type="file" name="image" class="form-control" value="{{ $quack->image }}">
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label><span class="hidden-xs">Tags</span></label>
                                            <div class="input-group">
                                                <input type="string" name="tags" class="formcontrol"
                                                    value="{{ $quack->tags }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary rounded-pill
shadow-sm">Mettre à jour</button>
                            </form>
                            <!-- Fin du formulaire -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
