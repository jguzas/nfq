@section('content')
<div class="panel panel-default clearfix">

    <p class="lead">Vieši albumai</p>
    @foreach($albums as $album)
        <div class="panel panel-default clearfix">
            <strong>{{ $album->title }}</strong>
             <a href="{{ route('albums.photos.index', ['albums'=>$album->id]) }}" class="btn btn-success" role="button">
                 Peržiūrėti nuotraukas
             </a>
        </div>
    @endforeach
</div>
@stop