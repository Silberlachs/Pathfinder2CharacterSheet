<?php
declare(strict_types=1);

namespace Pathfinder\DatabaseAdapter;

class Adapter
{
    private string $prefix;

    public function __construct(string $characterNamePrefix)
    {
        $this->prefix = $characterNamePrefix;
    }

    public function saveSingleValue(string $name, $value)
    {
        add_option($this->prefix . $name, $value);
    }

    public function loadSingleValue(string $name)
    {
        return get_option($this->prefix . $name);
    }

}