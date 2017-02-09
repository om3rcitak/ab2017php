@extends("layout.layout")

@section("degisken")
    <h1>Film Ekleme</h1>

    <form method="post" action="{{ url("movie") }}">

        <div class="form-group">
            <label for="name">Film İsmi</label>
            <input type="text" name="name" id="name" class="form-control">
        </div>

        <div class="form-group">
            <label for="description">Film Açıklaması</label>
            <textarea class="form-control" name="description" id="description" cols="30" rows="10"></textarea>
        </div>

        <div class="form-group">
            <label for="imdb">IMDB</label>
            <input type="text" name="imdb" id="imdb" class="form-control">
        </div>

        <div class="form-group">
            <label for="duration">Film Süresi</label>
            <input type="text" name="duration" id="duration" class="form-control">
        </div>

        <div class="form-group">
            <label for="publish">Yayınlanma Tarihi</label>
            <input type="text" class="form-control" name="publish" id="publish">
        </div>

        <button type="submit" class="btn btn-primary">Ekle</button>

    </form>
@stop