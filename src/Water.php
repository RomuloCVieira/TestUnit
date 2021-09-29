<?php
declare(strict_types=1);

namespace SOLID;

use DateTime;

class Water extends Item
{
    public function __construct(string $description, float $price)
    {
        parent::__construct("Water", $description, $price);
    }
}