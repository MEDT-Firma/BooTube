<?php
require_once "video.php";

class VimeoVideo implements VideoInterface
{
    private $name;
    private $link;
    private $thumbnails;

    function __construct($name, $link, $thumbnails)
    {
        $this->name = $name;
        $this->link = $link;
        $this->thumbnails = $thumbnails;
    }

    function getHTMLEmbedded($width, $height)
    {
        return "<iframe src=\"" . $this->link . "\" width=\"{$width}\" height=\"{$height}\" frameborder=\"0\" allow=\"autoplay; fullscreen\" allowfullscreen></iframe>";
    }

    function getName()
    {
        return $this->name;
    }

    function getThumbnailUrl()
    {
        return $this->thumbnails;
    }

    public function getVideoTypeHTML()
    {
        return '<span class="videotype"><img src="assets/logos/vimeo.png"></span>';
    }
}

