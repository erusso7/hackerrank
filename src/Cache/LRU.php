<?php declare(strict_types = 1);

namespace App\Cache;

use App\Lists\Item;

class LRU
{
    private array $store = [];
    private int $size;

    private int $count = 0;
    private ?Item $first = null;
    private ?Item $last = null;

    public function __construct(int $size)
    {
        $this->size = $size;
    }

    public function put($key, $value): void
    {
        $newItem = new Item($value, $key);
        if ($this->count === 0) {
            $this->count++;
            $this->first = $newItem;
            $this->last = $newItem;
            $this->store[$key] = $newItem;

            return;
        }

        if ($this->count === $this->size) {
            $this->count--;
            unset($this->store[$this->first->key()]);
            $this->first = $this->first->next();
            $this->first->setPrev(null);
        }

        $this->count++;
        $this->store[$key] = $newItem;
        $newItem->setPrev($this->last);
        $this->last->setNext($newItem);
        $this->last = $newItem;
    }

    public function get($key)
    {
        if (!array_key_exists($key, $this->store)) {
            return -1;
        }
        $item = $this->store[$key];
        $this->setTheElementAsTheMRU($item);

        return $item->value();
    }

    private function setTheElementAsTheMRU(Item $itemToMove)
    {
        if ($itemToMove === $this->last) {
            return;
        }

        if ($itemToMove === $this->first) {
            $itemToMove->next()->setPrev(null);
            $this->first = $itemToMove->next();
            $itemToMove->setPrev($this->last);
            $itemToMove->setNext(null);
            $this->last->setNext($itemToMove);
            $this->last = $itemToMove;

            return;
        }

        $this->last->setNext($itemToMove);
        $itemToMove->next()->setPrev($itemToMove->prev());
        $itemToMove->prev()->setNext($itemToMove->next());
        $itemToMove->setPrev($this->last);
        $itemToMove->setNext(null);
        $this->last = $itemToMove;
    }
}