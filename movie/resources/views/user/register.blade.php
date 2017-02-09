@extends("layout.layout")

@section("degisken")

    @if(session('hata'))
        <div class="alert alert-danger">
            <p>{{ session('hata') }}</p>
        </div>
    @endif

    <form method="post" action="{{ url('register') }}">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Kayıt Ol</h3>
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label for="name">İsim</label>
                    <input type="text" name="name" id="name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="email">E-Posta Adresi</label>
                    <input type="email" name="email" id="email" class="form-control">
                </div>
                <div class="form-group">
                    <label for="password">Şifre</label>
                    <input type="password" name="password" id="password" class="form-control">
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Şifre Tekrarı</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Kayıt Ol</button>
            </div>
        </div>
    </form>
@stop