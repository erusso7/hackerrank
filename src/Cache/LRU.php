<?php declare(strict_types = 1);

namespace App\Cache;

class LRU
{
    private array $store = [];
    private int $size;

    public function __construct(int $size)
    {
        $this->size = $size;
    }

    public function put($key, $value): void
    {
        if (count($this->store) === $this->size) {
            $this->removeTheLeastRecentlyUsed();
        }
        $this->store[(string)$key] = new LRUItem($key, $value);
    }

    public function get($key)
    {
        if (array_key_exists($key, $this->store)) {
            /** @var LRUItem $item */
            $item = $this->store[$key];
            $item->setUsed(microtime(true));

            return $item->value();
        }

        return -1;
    }

    /**
     * O(n) = n
     * This is a low efficient way to solve the LRU cache.
     * An improvement could be to keep the Items sorted by
     * the 'used' timestamp.
     */
    private function removeTheLeastRecentlyUsed(): void
    {
        /** @var LRUItem|null $lru */
        $lru = null;
        foreach ($this->store as $key => $item) {
            if ($lru === null) {
                $lru = $item;
                continue;
            }

            if ($lru->isOlder($item)) {
                $lru = $item;
            }
        }

        unset($this->store[$lru->key()]);
    }
}