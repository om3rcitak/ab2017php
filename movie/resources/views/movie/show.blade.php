@extends("layout.layout")

@section("degisken")
    <h1>{{ $movie->name }}</h1>
    <p>{{ $movie->description }}</p>
    <p>IMDB: {{ $movie->imdb }}</p>
    <p>Duration: {{ $movie->duration }}</p>
    @if(auth()->check())
        <p><a href="{{ url('movie/'.$movie->id.'/delete') }}" class="btn btn-danger">Sil</a></p>
        <p><a href="{{ url('movie/'.$movie->id.'/edit') }}" class="btn btn-warning">Düzenle</a></p>
    @endif
@stop