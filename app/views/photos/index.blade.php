@section('content')
<div class="panel panel-default clearfix">
    <p class="lead">{{$albums->title}}</p>
    <div class="mosaicflow" data-item-height-calculation="attribute">
    @foreach($photos as $photo)
         <div class="mosaicflow__item">
            <a href="/uploads/{{$photo->path}}" data-lightbox="roadtrip">
                <img src="/uploads/{{$photo->path}}" alt="{{$photo->title}}">
            </a>
                {{ Form::model( $photo, ['route' => ['albums.photos.destroy', $albums->id, $photo->id,], 'method' => 'DELETE']) }}
                {{ Form::submit("Trinti", ["class" => "btn btn-danger btn-xs"]) }}
                {{ Form::close() }}
         </div>
    @endforeach
     </div>
</div>
    </div>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="/js/jquery.mosaicflow.js"></script>
    <script src="/js/jquery-1.10.2.min.js"></script>
    <script src="/js/lightbox-2.6.min.js"></script>

@stop