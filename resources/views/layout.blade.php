<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>2019-nCoV</title>

    <meta property="og:title" content="" />
    <meta property="og:description" content="" />
    <meta property="og:image" content="https://corona-virus.live/og-image.jpg" />
    <meta property="og:url" content= "https://corona-virus.live/" />

    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#333333">
    <link rel="stylesheet" href="/style.css" />
</head>
<body>

<div class="fullscreen-bg">
    <video loop muted autoplay playsinline poster="/video/bg.jpg" class="fullscreen-bg__video">
        <source src="/video/bg-movie-1.mp4" type="video/mp4">
    </video>
</div>

<div class="container h-100" style="position: relative;">
    <h1 class="text-hide page-title" style="">Coronavirus live</h1>

    <div class="row align-items-center counter-row" style="height: 75%">
        <div class="col text-center">
            <span class="counter">{{ $deaths }}</span>
            <h3>deaths</h3>
        </div>
        <div class="col text-center">
            <span class="counter">{{ $infected }}</span>
            <h3>infected</h3>
        </div>
        <div class="col text-center">
            <span class="counter">{{ $countries }}</span>
            <h3>countries</h3>
        </div>
        <div class="col text-center">
            <span class="counter">{{ $cities }}</span>
            <h3>cities</h3>
        </div>
    </div>
</div>
<audio src="/video/bg-audio.mp3" autoplay loop>
    audio is not supported.
</audio>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
{{--<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>--}}
{{--<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>--}}
{{--<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>--}}
<!-- Yandex.Metrika counter -->
<script type="text/javascript" >
    (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
        m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
    (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

    ym(57187531, "init", {
        clickmap:true,
        trackLinks:true,
        accurateTrackBounce:true,
        webvisor:true
    });
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/57187531" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
</body>
</html>
