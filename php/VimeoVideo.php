<?php
require_once "video.php";

class VimeoVideo implements VideoInterface
{
    public $name;
    private $link;

    function __construct($name, $link)
    {
        $this->name = $name;
        $this->link = $link;
    }

    function getHTMLEmbedded($width, $height)
    {
        return "<iframe src=\"".$this->link."\" width=\"{$width}\" height=\"{$height}\" frameborder=\"0\" allow=\"autoplay; fullscreen\" allowfullscreen></iframe>";
    }

    function getName()
    {
        return $this->name;
    }

    function getThumbnailUrl()
    {
        // TODO: Implement getThumbnailUrl() method.
    }
}
$vimeoVideo = new VimeoVideo("fuck", "https://player.vimeo.com/video/14166815");
