<!DOCTYPE html>
<html>
    <head>
        <title>NFQ galerija</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" type="text/css" href="/css/normalize.css">
        <link rel="stylesheet" type="text/css" href="/bootstrap/css/bootstrap.css">
        <link href="/css/lightbox.css" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="/css/style.css">


        {{ HTML::style('/downloads/css/basic.css');}}
        {{ HTML::script('/downloads/dropzone.js') }}

        <?php function random_pic($dir = 'uploads'){
            $files = glob($dir . '/*.*');
            $file = array_rand($files);
            return $files[$file];} ?>
        <style>
        html {
        background: url(<?php echo '/'.random_pic(); ?>) no-repeat center center fixed;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
        }
        </style>

    </head>
    <body>

        @include("menu")



        <div class="container">
            @yield("content")
        </div>
        <footer>

        </footer>

        <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
        <script src="/bootstrap/js/bootstrap.min.js"></script>
    </body>
</html>