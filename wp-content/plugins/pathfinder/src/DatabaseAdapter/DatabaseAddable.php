<?php

namespace Pathfinder\DatabaseAdapter;

interface DatabaseAddable
{
    public function getObjectType():string;
    public function getName():string;
}