<?php
declare(strict_types=1);

namespace Pathfinder\Character\Resistances;

class Resistance
{

    private string $name, $type;

    public function __construct(string $name, string $type)
    {
        $this->name = $name;
        $this->type = $type;
    }

    public function getType():string
    {
        return $this->type;
    }

    public function getName():string
    {
        return $this->name;
    }
}