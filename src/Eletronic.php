<?php

namespace SOLID;

use DateTime;

class Eletronic extends TaxItem
{
    public function __construct(string $description, float $price)
    {
        parent::__construct("Cigar", $description, $price);
    }

    public function getTax(DateTime $date): float
    {
        return 0.5;
    }
}