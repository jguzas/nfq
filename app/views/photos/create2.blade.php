@section("content")

<!-- jquery -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<!-- uploadfile -->
<link href="https://rawgithub.com/hayageek/jquery-upload-file/master/css/uploadfile.css" rel="stylesheet">
<script src="https://rawgithub.com/hayageek/jquery-upload-file/master/js/jquery.uploadfile.min.js"></script>

<!-- validationEngine -->
<script src="http://www.position-relative.net/creation/formValidator/js/languages/jquery.validationEngine-en.js" type="text/javascript" charset="utf-8"></script>

<script src="http://www.position-relative.net/creation/formValidator/js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>

<script>

    $(document).ready(function() {

        var settings = $("#mulitplefileuploader").uploadFile({
            //url: "{{ URL::to('upload') }}",
            method: "POST",
            allowedTypes:"jpg,png,gif",
            fileName: "myfile",
            autoSubmit:false,
            showStatusAfterSuccess:false,
            onSubmit:function(files)
            {
                $('<input>').attr({
                    type: 'text',
                    name: 'myfile[]',
                    value: files
                }).appendTo('#myform');
            },
            onSuccess:function(files,data,xhr)
            {
                $('#myform').submit();
            },
            onError: function(files,status,errMsg)
            {
                $("#status").html("<font color='green'>Something Wrong</font>");
            }
        });

        $('.submit_form').click(function() {

            var validate = $("#myform").validationEngine('validate');
            var has_file = $(".ajax-file-upload-statusbar").length //check if there files need upload

            if(validate){
                if(has_file != false){
                    settings.startUpload();
                }else{
                    $('#myform').submit();
                }
            }
        });

    });
</script>

    <form id="myform" action="{{ ['route' => 'photos.store'] }}" method="post" enctype="multipart/form-data">
        <input type="hidden" name="preview_image" id="preview_image" value="">
        <div id="mulitplefileuploader">Upload</div>
    <span class="submit_form">Submit Form</span>
    </form>




@stop