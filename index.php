
<html>
<head>
    <title>BooTube</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="assets/style.css">
    <style>
        main {
            display: flex;
            justify-content: center;
            flex-direction: row;
        }

        .video:hover {
            background-color: rgba(0, 0, 0, .1);
        }

        .video {
            padding: 4px;
            margin-top: 16px;
            margin-bottom: 16px;
            margin: 8px;
            min-width: 350px;
            flex: 1;

            display: inline-flex;
            justify-content: center;
            flex-direction: column;
            border: none;
            transition: background-color .3s;
        }

        .video img {
            width: 100%;
            height: auto;
        }

        .videos {
            display: inline-flex;
            flex-direction: row;
            flex-wrap: wrap;
            justify-content: space-between;
            max-width: 100em;
            width: 80%;
        }

        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 20;
            background-color: rgba(0, 0, 0, .5);

            display: flex;
            flex-direction: column;
            justify-content: center;

        }

        .overlay .player-wrapper {
            margin-left: auto;
            transition: margin .5s;
            margin-right: auto;
            display: inline-flex;
            flex-direction: column;
            align-items: end;
        }

        .overlay #embedded_code > * {
            max-width: 80vw;
            max-height: 70vh;
            width: 1280px;
            height: 720px;
        }



        #close_btn {
            fill: white;
            width: 32px;
            height: auto;
            margin-bottom: 16px;
            cursor: pointer;
        }

        .no-interact {
            user-select: none;
            overflow: hidden;
        }

        body:not(.no-interact) .overlay {
            display: none;
        }
        
        .video {
            cursor: pointer;
        }
        
        .video * {
            user-select: none;
        }
    </style>
</head>
<body class="no-interact">
<nav class="navbar navbar-light bg-light">
    <a class="navbar-brand" href="#">BooTube</a>
</nav>
<div id="overlay" class="overlay">
    <div class="player-wrapper">
        <svg onclick="closePopup(this)" id="close_btn" enable-background="new 0 0 512.001 512.001" height="512" viewBox="0 0 512.001 512.001" width="512" xmlns="http://www.w3.org/2000/svg"><g><path d="m512.001 84.853-84.853-84.853-171.147 171.147-171.148-171.147-84.853 84.853 171.148 171.147-171.148 171.148 84.853 84.853 171.148-171.147 171.147 171.147 84.853-84.853-171.148-171.148z"/></g></svg>
        <div id="embedded_code">
            <iframe class="video-player" width="" height="" src="https://www.youtube.com/embed/2mTTGe2sJOU" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
        </div>
    </div>
</div>
<main>
    <div class="videos">
        <?php
        for ($i = 1; $i <= 20; $i++) {
            $framecode = urlencode("<iframe src=\"https://player.vimeo.com/video/14166815\" frameborder=\"0\" allow=\"autoplay; fullscreen\" allowfullscreen></iframe>");
            $html_code = <<<ende
<div class="video card" embedded-code="{$framecode}" onclick="openPopup(this);">
            <img class="rounded" src="https://via.placeholder.com/1920x1080">
            <p>Horror Video #{$i} auf Vimeo</p>
        </div>
ende;
            echo $html_code . "\n";
        }

        ?>
    </div>
</main>

<script>
    function printCode(elem) {
        console.log(urldecode(elem.getAttribute("embedded-code")))
    }

    function urldecode(url) {
        return decodeURIComponent(url.replace(/\+/g, ' '));
    }

    function closePopup(elem) {
        document.body.classList.remove("no-interact");
    }

    function openPopup(elem) {
        let embeddedCode = urldecode(elem.getAttribute("embedded-code"));
        document.getElementById("embedded_code").innerHTML = embeddedCode;
        document.body.classList.add("no-interact");
    }
</script>
</body>
</html>