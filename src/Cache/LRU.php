<?php declare(strict_types = 1);

namespace App\Cache;

use App\Lists\Item;

class LRU implements SimpleCache
{
    /** @var Item[] $store */
    private array $store = [];
    private int $size;

    private ?Item $lru = null;
    private ?Item $mru = null;

    public function __construct(int $size)
    {
        $this->size = $size;
    }

    public function put($key, $value, int $ttu = 0): void
    {
        if (array_key_exists($key, $this->store)) {
            $this->store[$key]->setValue($value);
            $this->setTheElementAsTheMRU($key);

            return;
        }

        if (count($this->store) === $this->size) {
            $this->unsetTheLRU();
        }

        $newItem = new Item($value, $key);
        if ($this->lru === null) {
            $this->lru = $newItem;
        }

        $newItem->append($this->mru);
        $this->mru = $newItem;

        $this->store[$key] = $newItem;
    }

    public function get($key)
    {
        if (!array_key_exists($key, $this->store)) {
            return -1;
        }
        $item = $this->store[$key];
        $this->setTheElementAsTheMRU($item->key());

        return $item->value();
    }

    private function setTheElementAsTheMRU($key)
    {
        $itemToMove = $this->store[$key];
        if ($itemToMove === $this->mru) {
            return;
        }

        $itemToMove->next()->append($itemToMove->prev());
        $this->mru->prepend($itemToMove);
        $this->mru = $itemToMove;

        if ($itemToMove === $this->lru) {
            $this->lru = $itemToMove->next();
        }
    }

    private function unsetTheLRU(): void
    {
        unset($this->store[$this->lru->key()]);
        $this->lru = $this->lru->next();
        if ($this->lru !== null) {
            $this->lru->setPrev(null);
        }
    }
}
