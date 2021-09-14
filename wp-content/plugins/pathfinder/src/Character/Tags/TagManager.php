<?php

namespace Pathfinder\Character\Tags;

class TagManager
{
    private $tags;

    public function __construct()
    {
        $this->tags = [];
    }

    public function addTag(string $tag):void
    {
        if(!in_array($tag, $this->tags))
        {
            $this->tags [] = $tag;
        }
    }

    public function getTags():array
    {
        return $this->tags;
    }

    public function hasTag(string $tag):bool
    {
        return in_array($tag, $this->tags);
    }
}