<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>2019-nCoV</title>

    <style>
        .fullscreen-bg {
            position: fixed;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            overflow: hidden;
            z-index: -100;
            background-color: #333;
        }

        .fullscreen-bg__video {
            position: absolute;
            top: 50%;
            left: 50%;
            width: auto;
            height: auto;
            min-width: 100%;
            min-height: 100%;
            -webkit-transform: translate(-50%, -50%);
            -moz-transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
        }

        /*@media (max-width: 767px) {*/
        /*    .fullscreen-bg {*/
        /*        background: url('/video/bg.jpg') center center / cover no-repeat;*/
        /*    }*/

        /*    .fullscreen-bg__video {*/
        /*        display: none;*/
        /*    }*/
        /*}*/

        pre {
            color: #eee;
        }
    </style>

    <meta name="theme-color" content="#333" />
</head>
<body>
<div class="fullscreen-bg">
    <video loop muted autoplay poster="/video/bg.jpg" class="fullscreen-bg__video" playsinline disablePictureInPicture>
        {{--            <source src="video/big_buck_bunny.webm" type="video/webm">--}}
        <source src="/video/bg-movie.mp4" type="video/mp4">
        {{--            <source src="video/big_buck_bunny.ogv" type="video/ogg">--}}
    </video>
</div>
<pre>
    <b>Infected:</b> {{ $infected }}
    <b>Deaths:</b> {{ $dead }}
</pre>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
{{--<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>--}}
{{--<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>--}}
{{--<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>--}}
</body>
</html>
