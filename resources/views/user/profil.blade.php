@extends('layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 mx-auto">
                <div class="card mx-auto mt-5 mb-5" style="width: 18rem;">
                    <img src="{{ url('/images/user.png')}}" class="card-img-top" alt="..." width="40px" height="200px">
                    <div class="card-body">
                        <p class="card-text"></p>
                    </div>
                </div>
            </div>
        </div>
        <br>
    </div>
    @foreach ($quacks as $quack)
        <div class="card mx-auto mb-2" style="width: 30rem;">
            <img src="{{ asset('storage/uploads/' . $quack->image) }}" class="card-img-top" alt="...">
            <div class="card-body">
                <p class="card-text">
                <p>{{ $quack->content }}</p>
                </p>
            </div>
        </div>
        <div class="row btn-edit">
            <div class="col-md-3">
                <div class="update-btn">
                    <button type="submit" class="btn btn-primary rounded-pillshadow-sm"><a
                            href="{{ route('quacks.edit', $quack->id) }}" class="btn btn-primary btn-sm">Editer</a></button>
                </div>
            </div>
            <div class="col-md-3 suppr">
                <form action="{{ route('quacks.destroy', $quack->id) }}" method="POST" style="display: inline-block">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger rounded-pillshadow-sm"type=" submit">Supprimer</button>
                </form>
            </div>
        </div>
        <br>
    @endforeach
@endsection
