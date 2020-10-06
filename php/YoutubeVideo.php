<?php

require_once "video.php";

class YoutubeVideo implements VideoInterface{
    public $name;
    private $link;

    function __construct($name, $link){
        $this->name = $name;
        $this->link = $link;
    }


    function getHTMLEmbedded()
    {
        // TODO: Implement getHTMLEmbedded() method.
        return "<iframe width=\"560\" height=\"315\" src=\"".$this->link."\" frameborder=\"0\" allowfullscreen></iframe>";
    }

    function getName(){
        // TODO: Implement getName() method.
        return $this->name;

    }
}


$youtubevideo = new YoutubeVideo('horro', "https://www.youtube.com/embed/2mTTGe2sJOU\"");
echo $youtubevideo->getHTMLEmbedded();
