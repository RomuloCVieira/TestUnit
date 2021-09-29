<?php
declare(strict_types=1);

namespace SOLID;

use DateTime;

class Cigar extends TaxItem
{
    public const MONTH_OF_JANUARY_NUMBER = 1;

    public function __construct(string $description, float $price)
    {
        parent::__construct("Cigar", $description, $price);
    }

    public function getTax(DateTime $date): float
    {
        if(intval($date->format("m")) === self::MONTH_OF_JANUARY_NUMBER) {
            return 0.1;
        }
        return 0.2;
    }
}