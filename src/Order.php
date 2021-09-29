<?php
declare(strict_types=1);

namespace SOLID;

use DateTime;

class Order 
{
    public float $code ;
    public array $items ;

    public function __construct()
    {
        $this->code = floor(rand() * 1000000);
        $this->items = [];
    }

    public function addItem(Item $item) : void
    {
        array_push($this->items,$item);
    }

    public function getSubtotal() : float
    {
        return array_reduce(
            $this->items,
            function (float $total,Item $item) {
                $total += $item->price;

                return $total;
            },
            0
        );
    }

    public function getTaxes(DateTime $date): float
    {
        return array_reduce(
            $this->items,
            function (float $taxes,Item $item) use ($date) {
                if($item instanceof TaxItem) {
                    $taxes += $item->calculateTaxes($date);
                }

                return $taxes;
            },
            0
        );
    }

    public function getTotal(DateTime $date): float
    {
        return $this->getSubTotal() + $this->getTaxes($date);
    }
}