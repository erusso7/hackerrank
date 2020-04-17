<?php declare(strict_types = 1);

namespace App\Lists;

class FIFO
{
    public const DROP_FIRST = 1;
    public const DROP_LAST = 2;

    private ?Item $last = null;
    private ?Item $first = null;
    private int $size;
    private int $count = 0;
    private int $dropPolicy;

    public function __construct(
        int $size = 0,
        int $dropPolicy = self::DROP_LAST
    ) {
        $this->size = $size;
        $this->dropPolicy = $dropPolicy;
    }

    public function pop()
    {
        if ($this->count === 0) {
            return null;
        }
        $item = $this->first;
        $this->first = $item->next();
        $this->count--;

        return $item->value();
    }

    public function push($value)
    {
        $item = new Item($value);
        if ($this->count === 0) {
            $this->first = $item;
            $this->last = $item;
            $this->count++;

            return;
        }

        $this->count++;
        $item->setPrev($this->last);
        $this->last->setNext($item);
        $this->last = $item;
        $this->checkQueueSize();
    }

    private function checkQueueSize()
    {
        // The queue is unlimited
        if ($this->size === 0) {
            return;
        }

        // The queue is not full
        if ($this->count <= $this->size) {
            return;
        }

        // The queue is full and the last must be dropped
        if ($this->dropPolicy === self::DROP_LAST) {
            $this->count--;
            $this->last = $this->last->prev();
            $this->last->setPrev(null);

            return;
        }

        // The queue is full and the first must be dropped
        if ($this->dropPolicy === self::DROP_FIRST) {
            $this->count--;
            $this->first = $this->first->next();
            $this->first->setPrev(null);
        }
    }
}