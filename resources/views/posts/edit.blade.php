@extends('plantilla')
@section('titol', 'Nou Post')
@section('contingut')

    <h1>Editar post</h1>
    <form action="{{ route('posts.update',$post->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="titulo">Titol:</label>
            <input type="text" class="form-control" name="titol" id="titol" value="{{old('titol') ?? $post->titol }}">
            @error('titol')
                <small class="text-danger">{{$message}}</small> 
            @enderror
        </div>
    <!-- falta input editorial i preu -->
        <div class="form-group mt-3">
            <label for="contingut">Contingut:</label>
            <textarea class="form-control" name="contingut" id="contingut" rows="8">{{old('contingut') ?? $post->contingut}}
            </textarea>
            @error('contingut')
                <small class="text-danger">{{$message}}</small> 
            @enderror
        </div>

        <div class="d-grid gap-2 mt-3">
            <button type="submit" class="btn btn-dark">Enviar</button>
        </div>
    </form>
@endsection