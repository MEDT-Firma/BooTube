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

    function getThumbnailUrl()
    {
        // TODO: Implement getThumbnailUrl() method.
    }
}




$videos = array(
    new YoutubeVideo('The Call', "https://www.youtube.com/embed/2mTTGe2sJOU\"", "assets/TheCall.jpg"),
    new YoutubeVideo('Train to Busan 2', "https://www.youtube.com/embed/Oay4uHnjK_w\"", "assets/TraintoBusan2.jpg"),
    new YoutubeVideo('Rings', "https://www.youtube.com/embed/P9BqPsAe_vM\"", "assets/Rings.jpg"),
    new YoutubeVideo('Freaky', "https://www.youtube.com/embed/wTvwBs5chq0\"", "assets/Freaky.jpg"),
    new YoutubeVideo('Happy Deathday 2U', "https://www.youtube.com/embed/a3XZgayL00I\"", "HappyDeathDay2U.jpg")
);

//foreach ($videos as $ret){
//    echo $ret -> getHTMLEmbedded("300","200");
//
//}
