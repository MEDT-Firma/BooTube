<?php

require_once "video.php";

class YoutubeVideo implements VideoInterface{
    public $name;
    private $link;

    function __construct($name, $link){
        $this->name = $name;
        $this->link = $link;
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

    function getThumbnailUrl()
    {
        // TODO: Implement getThumbnailUrl() method.
    }
}


$youtubevideo = new YoutubeVideo('horro', "https://www.youtube.com/embed/2mTTGe2sJOU\"");
echo $youtubevideo->getHTMLEmbedded(300,200);
