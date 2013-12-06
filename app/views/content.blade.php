@extends("layout")
@section('content')
@if (Auth::check())

@else
            <div class="row">
                <div class="col-md-4 col-md-offset-4 panel panel-default">
                    <p class="text-center lead"><h1>NFQ galerija</h1></p>
                    {{ Form::open([
                    "route"        => "users/login",
                    "autocomplete" => "off",
                    "class" => "form-signin"
                    ]) }}
                    <h4>Prisijunk</h4>

                    {{ Form::label("username", "Vartotojo vardas") }}<br>
                    {{ Form::text("username", Input::old("username"), [
                    "placeholder" => "username",
                    "class" => "form-control",
                    "autofocus"=>"",
                    "required"=>""
                    ]) }}

                    {{ Form::label("password", "Slaptažodis") }}<br>
                    {{ Form::password("password", [
                    "placeholder" => "●●●●●●●●●●",
                    "class" => "form-control"
                    ]) }}<br>

                    {{ Form::submit("login", ["class" => "btn btn-lg btn-primary btn-block"]) }}
                    {{ Form::close() }}
                    <br>
                    <div class="btn-group btn-group-justified">
                        <a class="btn btn-danger" role="button" href="publicalbums">Vieši albumai</a>
                        <a class="btn btn-danger" role="button" href="publicphotos">Viešos nuotraukos</a>

                    </div>
                </div>
            </div>
@endif
@stop
