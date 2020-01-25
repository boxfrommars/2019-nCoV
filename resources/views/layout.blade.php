<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge, chrome=1" />
    <title>2019-nCoV</title>
</head>
<style>
    .fullscreen-bg {
        position: fixed;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        overflow: hidden;
        z-index: -100;
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
</body>
</html>
