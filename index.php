<html>
<head>
    <title>BooTube</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link href="assets/style.css">
    <style>/*
        .video, .video img {
            width: calc(192px * 2);
            height: calc(108px * 2);
        }*/

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
            /*width: 18%;*//*
            background-color: aquamarine;
            border: 1px black solid;*/
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
    </style>
</head>
<body>
<nav class="navbar navbar-light bg-light">
    <a class="navbar-brand" href="#">BooTube</a>
</nav>
<main>
    <div class="videos">
        <?php
        for ($i = 1; $i <= 20; $i++) {
            $framecode = urlencode("<iframe src=\"https://player.vimeo.com/video/14166815\" frameborder=\"0\" allow=\"autoplay; fullscreen\" allowfullscreen></iframe>");
            $html_code = <<<ende
<div class="video card" frame-code="{$framecode}" onclick="printCode(this);">
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
        console.log(urldecode(elem.getAttribute("frame-code")))
    }

    function urldecode(url) {
        return decodeURIComponent(url.replace(/\+/g, ' '));
    }
</script>
</body>
</html>