<?php
declare(strict_types=1);

namespace SOLID;

use DateTime;
use PHPUnit\Framework\TestCase;

class OrderTest extends TestCase
{
    private $order;

    public function testOrderCalculateSubTotal(): void
    {
        $this->order = new Order();  
        $this->order->addItem(new Eletronic('Marlboro', 10));
        $this->order->addItem(new Beer('Itaipava', 5));
        $this->order->addItem(new Cigar('Criystal 300ml', 2));

        $subTotal = $this->order->getSubtotal();

        $this->assertEquals(17, $subTotal);
    }

    public function testOrderCalculateTaxes(): void
    {
        $this->order = new Order();  
        $this->order->addItem(new Eletronic('Marlboro', 10));
        $this->order->addItem(new Beer('Itaipava', 5));
        $this->order->addItem(new Cigar('Criystal 300ml', 2));

        $taxes = $this->order->getTaxes(new DateTime("2021-07-09"));

        $this->assertEquals(5.9, $taxes);
    }

    public function testOrderCalculateHolidayTaxes(): void
    {
        $this->order = new Order();  
        $this->order->addItem(new Eletronic('Marlboro', 10));
        $this->order->addItem(new Beer('Itaipava', 5));
        $this->order->addItem(new Cigar('Criystal 300ml', 2));

        $taxes = $this->order->getTaxes(new DateTime("2021-01-09"));

        $this->assertEquals(5.7, $taxes);
    }

    public function testOrderCalculateTotal(): void
    {
        $this->order = new Order();  
        $this->order->addItem(new Eletronic('Marlboro', 10));
        $this->order->addItem(new Beer('Itaipava', 5));
        $this->order->addItem(new Cigar('Criystal 300ml', 2));

        $total = $this->order->getTotal(new DateTime());

        $this->assertEquals(22.9, $total);
    }
}