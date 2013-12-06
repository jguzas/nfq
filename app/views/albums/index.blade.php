@section('content')
<div class="panel panel-default clearfix">

    <p class="lead">Mano albumai</p>
    @foreach($albums as $album)
         <div class="panel panel-default clearfix">



             {{ Form::model( $album, ['route' => ['albums.destroy', $album->id], 'method' => 'DELETE', 'class' => 'form-inline', 'role'=>'form']) }}

             <a href="{{ route('albums.photos.index', ['albums'=>$album->id]) }}">
                 <strong>{{ $album->title }}</strong>
             </a>
             <a href="{{ route('albums.edit', ['albums' => $album->id]) }}" class="btn btn-success" role="button">Redaguoti</a>

             {{ Form::submit("Trinti", ["class" => "btn btn-danger"]) }}
             {{ Form::close() }}

         </div>
    @endforeach

</div>
@stop