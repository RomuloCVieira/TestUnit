<?php
declare(strict_types=1);

namespace SOLID;

use DateTime;

class Beer extends TaxItem
{
    public function __construct(string $description, float $price)
    {
        parent::__construct("Beer", $description, $price);
    }

    public function getTax(DateTime $date): float
    {
        return 0.1;
    }
}