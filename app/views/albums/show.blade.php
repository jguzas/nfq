@section('content')
<ul>
    <li>{{ $album->id }}</li>
    <li>{{ $album->title }}</li>
    <li>{{ $album->s_description }}</li>
    <form action="/albums/{{$album->id}}/photos/upload" class="dropzone" id="my-awesome-dropzone"></form>
</ul>
@stop