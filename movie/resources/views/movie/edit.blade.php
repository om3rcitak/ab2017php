@extends("layout.layout")

@section("degisken")
    <h1>Film Düzenleme</h1>

    <form method="post" action="{{ url("movie/".$movie->id) }}">

        <input type="hidden" name="_method" value="put" />

        <div class="form-group">
            <label for="name">Film İsmi</label>
            <input type="text" name="name" id="name" value="{{ $movie->name }}" class="form-control">
        </div>

        <div class="form-group">
            <label for="description">Film Açıklaması</label>
            <textarea class="form-control" name="description" id="description" cols="30" rows="10">{{ $movie->description }}</textarea>
        </div>

        <div class="form-group">
            <label for="imdb">IMDB</label>
            <input type="text" name="imdb" value="{{ $movie->imdb }}" id="imdb" class="form-control">
        </div>

        <div class="form-group">
            <label for="duration">Film Süresi</label>
            <input type="text" name="duration" value="{{ $movie->duration }}" id="duration" class="form-control">
        </div>

        <div class="form-group">
            <label for="publish">Yayınlanma Tarihi</label>
            <input type="text" class="form-control" value="{{ $movie->publish }}" name="publish" id="publish">
        </div>

        <button type="submit" class="btn btn-primary">Düzenle</button>

    </form>
@stop