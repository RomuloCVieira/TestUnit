<?php
declare(strict_types=1);

namespace SOLID;

use DateTime;
use SOLID\Item;

abstract class TaxItem extends Item
{
    public function __construct(string $category, string $description, float $price)
    {
        parent::__construct($category, $description, $price);
    }

    public function calculateTaxes(DateTime $date): float
    {
        return $this->price * $this->getTax($date);
    }

    public abstract function getTax(DateTime $date): float;
}