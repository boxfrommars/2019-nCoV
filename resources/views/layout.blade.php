<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>2019-nCoV Coronavirus stats online</title>
    <meta name="description" content="Deaths, infected, spreading: stats and metrics about 2019-nCoV coronavirus outbreak 24/7" />
    <meta name="keywords" content="virus in china,virus going around 2020,viruses,virus outbreak, virus protection, virus scan, virus outbreak in china, virus vs bacteria, virus definition, virus total" />

    <meta property="og:title" content="2019-nCoV Coronavirus stats online" />
    <meta property="og:description" content="Deaths, infected, spreading: stats and metrics about 2019-nCoV coronavirus outbreak 24/7" />
    <meta property="og:image" content="https://corona-virus.live/og-image.jpg" />
    <meta property="og:url" content= "https://corona-virus.live/" />

    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#333333">
    <link rel="stylesheet" href="/style.css?v=2" />
</head>
<body>

<div class="fullscreen-bg">
    <video loop muted autoplay playsinline poster="/video/bg.jpg" class="fullscreen-bg__video">
        <source src="/video/bg-movie-1.mp4" type="video/mp4">
    </video>
</div>

<div class="container-fluid h-100">
    <header>
        <nav class="navbar" style="padding-top: 20px;">
            <h1 class="text-hide page-title" style="">Coronavirus live</h1>
            <a href="#" id="toggle-audio" class="audio-on"></a>
        </nav>
    </header>
    <div class="container" style="height: 70%">
        <div class="row align-items-center counter-row h-100">
            <div class="col text-center">
                <span class="counter" id="deaths-number">{{ $deaths }}</span>
                <h3>deaths</h3>
            </div>
            <div class="col text-center">
                <span class="counter" id="infected-number">{{ $infected }}</span>
                <h3>infected</h3>
            </div>
            <div class="col text-center">
                <span class="counter" id="recovered-number">{{ $recovered }}</span>
                <h3>recovered</h3>
            </div>
        </div>
    </div>
    <?php
     $countries = [
         'China', 'Thailand', 'Hong Kong', 'Macau', 'Australia', 'Japan', 'Malaysia', 'Singapore',
         'France', 'South Korea', 'Taiwan', 'United States', 'Vietnam', 'Canada', 'Nepal'];

    $line = implode('&nbsp;&nbsp;&nbsp;&nbsp;', $countries);
    ?>
    <div class="countries marquee">
        <span>{!! implode('&nbsp;&nbsp;&nbsp;&nbsp;', [$line, $line, $line, $line, $line, $line, $line]) !!}</span>
    </div>
</div>
<audio src="/video/bg-audio.mp3" autoplay loop id="bg-audio">
    audio is not supported.
</audio>

<script
    src="https://code.jquery.com/jquery-3.4.1.min.js"
    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
    crossorigin="anonymous"></script>

<script>
    let audio = document.getElementById("bg-audio");
    let btn = document.getElementById("toggle-audio");

    btn.addEventListener('click', function(event) {
        event.preventDefault();
        if (audio.paused) {
            audio.play();
            btn.classList.add('audio-on');
            btn.classList.remove('audio-off');
        } else {
            audio.pause();
            btn.classList.add('audio-off');
            btn.classList.remove('audio-on');
        }
    });

    let liveUpdate = function () {
        $.get('/live', function(data) {
            $('#deaths-number').text(data.deaths);
            $('#infected-number').text(data.infected);
            $('#recovered-number').text(data.recovered);
        });
    };

    setInterval(liveUpdate, 30 * 1000);
</script>


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
