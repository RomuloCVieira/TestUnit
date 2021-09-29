<?php
declare(strict_types=1);

namespace SOLID;

class Item
{
    public string $category;
    public string $description;
    public float $price;

    public function __construct(string $category, string $description, float $price)
    {
        $this->category = $category;
        $this->description = $description;
        $this->price = $price;
    }
}