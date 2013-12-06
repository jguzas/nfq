@section("content")
<div class="col-md-6 col-md-offset-3 panel panel-default clearfix">
    <p class="lead">Naujas albumas</p>

    @if ($error = $errors->first("errors"))
    <div class="error">
        {{ $error }}
    </div>
    @endif

    @if ($errors->any())
    <div class="error">
        <h2>Errors</h2>
        <ul>
            {{ implode('', $errors->all('<li>:message</li>')) }}
        </ul>
    </div>
    @endif

    {{ Form::open([
        'route' => 'albums.store',
        'role'=> 'form'
    ]) }}

    <div class="form-group">
        {{ Form::label("title", "Albumo pavadinimas") }}
        {{ Form::text('title', '', ['class'=>'form-control']) }}
    </div>
    <div class="form-group">
        {{ Form::label("s_description", "Trumpas aprašymas") }}<br>
        {{ Form::text('s_description','',['class'=>'form-control']) }}<br>
    </div>
    <div class="form-group">
        {{ Form::label("l_description", "Pilnas aprašymas") }}<br>
        {{ Form::textarea("l_description",'',['class'=>'form-control']) }}<br>
    </div>
    <div class="form-group">
        {{ Form::label("place", "Vieta") }}<br>
        {{ Form::text('place','',['class'=>'form-control']) }}<br>
    </div>
    <div class="form-group">
        {{ Form::label("public", "Viešas?") }}<br>
        {{ Form::checkbox('public') }}<br>
    </div>

    {{ Form::submit("Sukurti", ["class" => "btn btn-lg btn-success btn-block"]) }}
    {{ Form::close() }}
</div>
@stop