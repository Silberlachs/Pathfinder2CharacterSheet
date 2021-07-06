<?php
declare(strict_types=1);

namespace Pathfinder\Character\Resistances;

class ResistanceManager
{
    private $resistances = [];

    public function addResistance(Resistance $resistance)
    {
        $this->resistances [] = $resistance;
    }

    public function removeResistance(string $name)
    {
        $target = -1;
        for($c = 0; $c< sizeof($this->resistances); $c+=1)
        {
            if($name === $this->resistances[$c]->getName())
            {
                $target = $c;
            }
        }

        unset($this->resistances[$target]);
    }

    public function getResistances(): array
    {
        return $this->resistances;
    }
}