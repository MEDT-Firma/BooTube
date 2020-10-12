<?php

require_once "video.php";

class YoutubeVideo implements VideoInterface{
    public $name;
    private $link;
    private $thumbnails;

    function __construct($name, $link, $thumbnails){
        $this->name = $name;
        $this->link = $link;
        $this->thumbnails = $thumbnails;
    }


    function getHTMLEmbedded($width, $height)
    {
        // TODO: Implement getHTMLEmbedded() method.
        return "<iframe width=\"{$width}\" height=\"{$height}\" src=\"".$this->link."\" frameborder=\"0\" allowfullscreen></iframe>";
    }

    function getName(){
        // TODO: Implement getName() method.
        return $this->name;

    }

    function getThumbnailUrl(){
        return $this->thumbnails;
    }
}

