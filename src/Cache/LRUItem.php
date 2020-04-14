<?php declare(strict_types = 1);

namespace App\Cache;

class LRUItem
{
    private $value;
    private $key;
    private float $used = 0;

    public function __construct($key, $value)
    {
        $this->key = $key;
        $this->value = $value;
        $this->used = microtime(true);
    }

    public function value()
    {
        return $this->value;
    }

    public function key()
    {
        return $this->key;
    }

    public function setUsed(float $used): void
    {
        $this->used = $used;
    }

    public function isOlder(LRUItem $item): bool
    {
        return $this->used > $item->used;
    }
}