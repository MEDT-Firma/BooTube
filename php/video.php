<?php

interface VideoInterface {
    function getHTMLEmbedded($width, $height); // zb <iframe..... oder <video....
    function getName(); // entweder youtube, vimeo oder local
    function getThumbnailUrl(); // url vom thumbnail des videos
    function getVideoTypeHTML();
}