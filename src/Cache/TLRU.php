<?php declare(strict_types = 1);

namespace App\Cache;

use App\Lists\Item;

class TLRU implements SimpleCache
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
        if (count($this->store) === $this->size) {
            $this->unsetTheLRU();
        }

        $newItem = new Item($value, $key, $ttu);

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
        if ($item->isExpired()) {
            $this->removeExpiredElement($item);

            return -1;
        }

        $this->setTheElementAsTheMRU($item);

        return $item->value();
    }

    private function setTheElementAsTheMRU(Item $itemToMove)
    {
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
        $this->lru->setPrev(null);
    }

    private function removeExpiredElement(Item $item): void
    {
        if ($this->lru === $item) {
            $this->lru = $item->next();
        }

        if ($this->mru === $item) {
            $this->mru = $item->prev();
        }

        if ($item->prev() !== null) {
            $item->prev()->append($item->next());
        }

        unset($this->store[$item->key()]);
    }
}