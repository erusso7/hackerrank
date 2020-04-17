<?php declare(strict_types = 1);

namespace App\Lists;

class Item
{
    private ?Item $next = null;
    private $value;

    public function __construct($value)
    {
        $this->value = $value;
    }

    public function setNext(?Item $item)
    {
        $this->next = $item;
    }

    public function next(): ?Item
    {
        return $this->next;
    }

    public function value()
    {
        return $this->value;
    }
}