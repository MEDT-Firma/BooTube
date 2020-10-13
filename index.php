<html>
    <head>
        <title>BooTube</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="assets/style.css">
    </head>
    <body>
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
                require_once "php/LocalVideo.php";

                $videos = array(
                    new YoutubeVideo('THE CALL Official Trailer (2020) Horror Movie', "https://www.youtube.com/embed/2mTTGe2sJOU\"", "assets/TheCall.jpg"),
                    new YoutubeVideo('TRAIN TO BUSAN 2: Peninsula Trailer German Deutsch (2020)', "https://www.youtube.com/embed/Oay4uHnjK_w\"", "assets/TraintoBusan2.jpg"),
                    new YoutubeVideo('RINGS Trailer German Deutsch (2017)', "https://www.youtube.com/embed/P9BqPsAe_vM\"", "assets/Rings.jpg"),
                    new YoutubeVideo('FREAKY Trailer German Deutsch (2020)', "https://www.youtube.com/embed/wTvwBs5chq0\"", "assets/Freaky.jpg"),
                    new YoutubeVideo('HAPPY DEATHDAY 2U Trailer German Deutsch (2019)', "https://www.youtube.com/embed/a3XZgayL00I\"", "assets/HappyDeathDay2U.jpg"),   
                    new VimeoVideo("HorrorShort", "https://player.vimeo.com/389485830", "assets/vimeoHorrorShort.jpg"),
                    new VimeoVideo("HorrorTrailer - H+H Brandsmiths", "https://player.vimeo.com/video/224447708", "assets/vimeoHorrorTrailer_HH_Brandsmiths.jpg"),
                    new VimeoVideo("The Philosophy of Horror", "https://player.vimeo.com/video/364459027", "assets/vimeoThe Philosophy_of_Horror.jpg"),
                    new VimeoVideo("Night Things", "https://player.vimeo.com/video/4475948", "assets/vimeoNightThings.jpg"),
                    new VimeoVideo("The Beach House", "https://player.vimeo.com/video/439764966", "assets/vimeoTheBeachHouse.jpg"),
                    new LocalVideo("ANNABELLE 3 Trailer German Deutsch (2019)", "assets/videos/annabelle-3-trailer-german-deutsch-2019.mp4", "assets/annabelle.jpg"),
                    new LocalVideo("IT - Official Teaser Trailer", "assets/videos/it-official-teaser-trailer.mp4", "assets/IT.jpg"),
                    new LocalVideo("The Conjuring - Official Main Trailer [HD]", "assets/videos/the-conjuring-official-main-trailer-hd.mp4", "assets/theconjuring.jpg"),
                    new LocalVideo("THE NUN Trailer German Deutsch (2018)", "assets/videos/the-nun-trailer-german-deutsch-2018.mp4", "assets/the nun.jpg"),
                    new LocalVideo("Us - Official Trailer [HD]", "assets/videos/us-official-trailer-hd.mp4", "assets/us.jpg")
                );

                foreach ($videos as $video) {
                    $framecode = urlencode($video->getHTMLEmbedded(0,0));
                    $html_code = <<<ende
                    <div class="video card" embedded-code="{$framecode}" onclick="openPopup(this);">
                        <img class="rounded" src="{$video->getThumbnailUrl()}">
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
                document.getElementById("embedded_code").innerHTML = "";
            }

            function openPopup(elem) {
                let embeddedCode = urldecode(elem.getAttribute("embedded-code"));
                document.getElementById("embedded_code").innerHTML = embeddedCode;
                document.body.classList.add("no-interact");
            }
        </script>
    </body>
</html>
