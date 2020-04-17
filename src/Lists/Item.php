<?php declare(strict_types = 1);

namespace App\Lists;

class Item
{
    private ?self $next = null;
    private ?self $prev = null;
    private $value;

    public function __construct($value)
    {
        $this->value = $value;
    }

    public function setNext(?self $item)
    {
        $this->next = $item;
    }

    public function next(): ?self
    {
        return $this->next;
    }

    public function setPrev(?self $prev): void
    {
        $this->prev = $prev;
    }

    public function prev(): ?self
    {
        return $this->prev;
    }

    public function value()
    {
        return $this->value;
    }
}