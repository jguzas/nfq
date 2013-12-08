@section("content")

<div class="row">
    <div class="col-md-10 col-md-offset-1 panel panel-default ">
        <p class="lead">{{$album->title}}</p>

        @if ($errors->any())
        <div class="error">
            <h2>Errors</h2>
            <ul>
                {{ implode('', $errors->all('<li>:message</li>')) }}
            </ul>
        </div>
        @endif

        <div class="row">

            <div class="col-md-6 ">

            {{ Form::model(
            $album,
            ['route' => ['albums.update', $album->id],
            'method' => 'PUT']
            ) }}

            {{ Form::label("title", "Albumo pavadinimas") }}<br>
            {{ Form::text('title') }}<br>

            {{ Form::label("s_description", "Trumpas aprašymas") }}<br>
            {{ Form::text('s_description') }}<br>

            {{ Form::label("l_description", "Pilnas aprašymas") }}<br>
            {{ Form::textarea("l_description") }}<br>

            {{ Form::label("place", "Vieta") }}<br>
            {{ Form::text('place') }}<br>

            {{ Form::label("public", "Viešas?") }}<br>
            {{ Form::checkbox('public') }}<br>

            {{ Form::submit("Atnaujinti", ["class" => "btn btn-lg btn-success btn-block"]) }}
            {{ Form::close() }}

            </div>

            <div class="col-md-5 panel panel-default ">
                <form action="/albums/{{$album->id}}/photos/upload" class="dropzone" id="my-awesome-dropzone"></form>
            </div>

        </div>
    </div>
</div>

@stop