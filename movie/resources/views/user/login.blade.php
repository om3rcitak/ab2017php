@extends("layout.layout")

@section("degisken")

    @if(session('hata'))
        <div class="alert alert-danger">
            <p>{{ session('hata') }}</p>
        </div>
    @endif

    <form method="post" action="{{ url('login') }}">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Giriş Yap</h3>
        </div>
        <div class="panel-body">
            <div class="form-group">
                <label for="email">E-Posta Adresi</label>
                <input type="email" name="email" id="email" class="form-control">
            </div>
            <div class="form-group">
                <label for="password">Şifre</label>
                <input type="password" name="password" id="password" class="form-control">
            </div>
            <div class="form-group">
                <input type="checkbox" name="remember" value="1" />

                Beni Hatırla
            </div>
            <button type="submit" class="btn btn-primary">Giriş Yap</button>
        </div>
    </div>
    </form>
@stop