@section('content')
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/
libs/jquery/1.3.0/jquery.min.js"></script>
<script>
    $(document).ready(function()
    {
        $("span.on_img").mouseover(function ()
        {
            $(this).addClass("over_img");
        });

        $("span.on_img").mouseout(function ()
        {
            $(this).removeClass("over_img");
        });
    });

    $(function() {
        $(".love").click(function()
        {
            var id = $(this).attr("id");
            var dataString = 'id='+ id ;
            var parent = $(this);


            $(this).fadeOut(300);
            $.ajax({
                type: "POST",
                url: "/favourites",
                data: dataString,
                cache: false,

                success: function(html)
                {
                    parent.html(html);
                    parent.fadeIn(300);
                }
            });


            return false;

        });
    });
</script>
    <div class="panel panel-default clearfix">
        <p class="lead">{{$albums->title}}</p>
        <div class="mosaicflow" data-item-height-calculation="attribute">
        @foreach($photos as $photo)
             <div class="mosaicflow__item">
                <a href="/uploads/{{$photo->path}}" data-lightbox="roadtrip">
                    <img src="/uploads/{{$photo->path}}" alt="{{$photo->title}}">
                </a>


                @if(Auth::check())


                 {{ Form::model( $photo, ['route' => ['albums.photos.destroy', $albums->id, $photo->id,], 'method' => 'DELETE']) }}

                 @if(Auth::user()->role=='admin')
                    {{ Form::submit("Trinti", ["class" => "btn btn-danger btn-xs"]) }}
                 @endif

                     <a href="#" class="love" id="{{$photo->id}}">
                         <button class="btn btn-success btn-xs">Patinka: {{$photo->favourites}}</button>
                     </a>

                 {{ Form::close() }}

                 @endif

             </div>
        @endforeach
         </div>
    </div>



    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="/js/jquery.mosaicflow.js"></script>
    <script src="/js/jquery-1.10.2.min.js"></script>
    <script src="/js/lightbox-2.6.min.js"></script>

@stop