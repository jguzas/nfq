@extends("layout")
@section("content")

@if ($error = $errors->first("password"))
    <div class="error">
        {{ $error }}
    </div>
@endif
    <div class="row">
        <div class="col-md-4 col-md-offset-4 panel panel-default">
            {{ Form::open([
                "route"        => "users/login",
                "autocomplete" => "off",
                "class" => "form-signin"
            ]) }}
            <h2>Please sign in</h2>

            {{ Form::label("username", "Username") }}<br>
            {{ Form::text("username", Input::old("username"), [
            "placeholder" => "username",
            "class" => "form-control",
            "autofocus"=>"",
            "required"=>""
            ]) }}

            {{ Form::label("password", "Password") }}<br>
            {{ Form::password("password", [
            "placeholder" => "●●●●●●●●●●",
            "class" => "form-control"
            ]) }}<br>

            {{ Form::submit("login", ["class" => "btn btn-lg btn-primary btn-block"]) }}
            {{ Form::close() }}
        </div>
    </div>

@stop