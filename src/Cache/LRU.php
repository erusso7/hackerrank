<?php declare(strict_types = 1);

namespace App\Cache;

use App\Lists\Item;

class LRU implements SimpleCache
{
    private array $store = [];
    private int $size;

    private ?Item $first = null;
    private ?Item $last = null;

    public function __construct(int $size)
    {
        $this->size = $size;
    }

    public function put($key, $value, ?int $microTtu = null): void
    {
        $newItem = new Item($value, $key);
        if (count($this->store) === 0) {
            $this->first = $newItem;
            $this->last = $newItem;
            $this->store[$key] = $newItem;

            return;
        }

        if (count($this->store) === $this->size) {
            unset($this->store[$this->first->key()]);
            $this->first = $this->first->next();
            $this->first->setPrev(null);
        }

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
            $this->last->prepend($itemToMove);
            $this->last = $itemToMove;
            $this->first = $itemToMove->next();

            $this->first->setPrev(null);
            $this->last->setNext(null);

            return;
        }

        $itemToMove->prev()->prepend($itemToMove->next());
        $this->last->prepend($itemToMove);
        $this->last = $itemToMove;
        $this->last->setNext(null);
    }
}