@extends('layout.layout')

@section('title', "Film Listesi")

@section('degisken')
<p>Film Listesi</p>

@if($movies->count() > 0)

@foreach($movies as $movie)
<h1><a href="{{ url('movie/'.$movie->id) }}">{{ $movie->name }}</a></h1>
<p>IMDB: {{ $movie->imdb }}</p>
<hr>
@endforeach

@else
    <div class="alert alert-danger">Film Bulunamadı!</div>
@endif

{!! $movies->render() !!}
@stop