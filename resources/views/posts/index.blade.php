@extends('plantilla')

@section('titol','Llistat posts')

@section('contingut')
@auth
    <h4 class = "alert alert-success">Benvingut/a {{ auth()->user()->login }}</h4>
@endauth
    
    <h1>Llistat de posts</h1>
    @if(session()->has('mensaje_ok'))
        <div class="alert alert-success">
            {{ session('mensaje_ok') }}
        </div>
    @endif
    @forelse ($posts as $post )
    <div class="card my-2">
        <div class="card-header">
            <h3>{{$post->titol}}</h3> | <span class="small"> <i class="bi bi-person-square"></i> <strong>{{ $post->usuari->login}}</strong></span>
        </div>
        <div class="card-body">

            <a class="btn btn-dark" href="{{ route('posts.show', $post) }}"><i class="bi bi-eyeglasses"></i></a>
        @auth
            <a class="btn btn-dark" href="{{ route('posts.edit', $post) }}"><i class="bi bi-pencil-square"></i></a> 
        @endauth
        
        @auth
            <form action="{{route('posts.destroy', $post)}}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-info">Esborrar</button>
            </form>
        @endauth
        </div>
    </div>
        
    @empty
        <h2>Encara no hi ha cap post publicat</h2>
    @endforelse

    <div class="my-4">
        {{ $posts->links() }}
    </div>
@endsection