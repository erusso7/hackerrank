<?php declare(strict_types = 1);

namespace App\Lists;

class Item
{
    private ?self $next = null;
    private ?self $prev = null;
    private $value;
    private $key;
    private ?float $expiresAt;

    public function __construct($value, $key = null, ?float $expiresAt = 0)
    {
        $this->value = $value;
        $this->key = $key;
        $this->expiresAt = $expiresAt;
    }

    public function key()
    {
        return $this->key;
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

    public function prepend(?self $next): void
    {
        $this->setNext($next);

        if ($next !== null) {
            $next->setPrev($this);
        }
    }

    public function append(?self $prev): void
    {
        $this->setPrev($prev);

        if ($prev !== null) {
            $prev->setNext($this);
        }
    }

    public function isExpired(): bool
    {
        return $this->expiresAt < microtime(true);
    }

    public function __toString()
    {
        return $this->key ?? '';
    }
}