@extends ('layouts.app')

@section('title')
Mon compte
@endsection

@section('content')
<div class="container mb-4">
    <h3>Mes informations</h3>
    <a href="{{ route('user.account.edit')}}"><button class="btn btn-primary mb-2">modifier les informations</button></a>
    <form action="{{ route('user.destroy', $user)}}" method="post">
        @csrf
        
    </form>
</div>