<html>
    <head>
        <title>BooTube</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="assets/style.css">
    </head>
    <body class="no-interact">
        <nav class="navbar navbar-dark">
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

                require_once "php/VimeoVideo.php";
                require_once "php/YoutubeVideo.php";

                $videos = array(
                    
                );

                if (count($videos) == 0)
                    for ($i = 0; $i < 20; $i++)
                        $videos[$i] = $youtubevideo;

                foreach ($videos as $video) {
                    $framecode = urlencode($video->getHTMLEmbedded(0,0));
                    $html_code = <<<ende
        <div class="video card" embedded-code="{$framecode}" onclick="openPopup(this);">
                    <img class="rounded" src="https://via.placeholder.com/1920x1080">
                    <p>{$video->getName()}</p>
                </div>
ende;
                    echo $html_code . "\n";
                }

                ?>
            </div>
        </main>

        <script>
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