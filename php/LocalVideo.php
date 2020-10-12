<?php
require_once "video.php";

class LocalVideo implements VideoInterface {

    private $name;
    private $video_url;
    private $thumbnail_url;

    public function __construct($name, $video_url, $thumbnail_url)
    {
        $this->name = $name;
        $this->video_url = $video_url;
        $this->thumbnail_url = $thumbnail_url;
    }

    function getHTMLEmbedded($width, $height)
    {
        return "<video width='{$width}' height='{$height}' controls><source src='{$this->video_url}' type='video/mp4'></video> ";
    }

    function getName()
    {
        return $this->name;
    }

    function getThumbnailUrl()
    {
        return $this->thumbnail_url;
    }
}
