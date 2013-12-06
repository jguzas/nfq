@section('content')
<div class="panel panel-default clearfix">
    <p class="lead">Viešos nuotraukos</p>
    <div class="mosaicflow" data-item-height-calculation="attribute">
    @foreach($photos as $photo)
        @foreach($photo->photos as $item)
        <div class="mosaicflow__item">
            <a href="/uploads/{{$item->path}}" data-lightbox="roadtrip"><img src="/uploads/{{$item->path}}" alt="{{$item->title}}"></a>
            <p>{{$item->title}}</p>
        </div>
        @endforeach
    @endforeach
    </div>

</div>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="/js/jquery.mosaicflow.js"></script>
    <script src="/js/jquery-1.10.2.min.js"></script>
    <script src="/js/lightbox-2.6.min.js"></script>

@stop