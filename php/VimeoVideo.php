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

    function getHTMLEmbedded()
    {
        return "<iframe src=\"".$this->link."\" width=\"640\" height=\"421\" frameborder=\"0\" allow=\"autoplay; fullscreen\" allowfullscreen></iframe>";
    }

    function getName()
    {
        return $this->name;
    }
}
$vimeoVideo = new VimeoVideo("fuck", "https://vimeo.com/14166815");
echo $vimeoVideo->getHTMLEmbedded();
