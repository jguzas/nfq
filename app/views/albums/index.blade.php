@section('content')
<div class="panel panel-default clearfix">

    <p class="lead">Albumai</p>
    @foreach($albums as $album)
         <div class="panel panel-default clearfix">


             @if ( $album->user_id == Auth::user()->id && Auth::user()->role == 'admin')
             {{ Form::model( $album, ['route' => ['albums.destroy', $album->id], 'method' => 'DELETE', 'class' => 'form-inline', 'role'=>'form']) }}
             @endif

             <a href="{{ route('albums.photos.index', ['albums'=>$album->id]) }}">
                 <strong>{{ $album->title }}</strong>
             </a>

             @if ( $album->user_id == Auth::user()->id && Auth::user()->role == 'admin')
             <a href="{{ route('albums.edit', ['albums' => $album->id]) }}" class="btn btn-success" role="button">Redaguoti</a>

             {{ Form::submit("Trinti", ["class" => "btn btn-danger"]) }}
             Nuotraukų <strong>{{$album->photos_number}}</strong>
             @endif
             {{ Form::close() }}


         </div>
    @endforeach

</div>
@stop