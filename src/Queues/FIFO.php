<?php declare(strict_types = 1);

namespace App\Queues;

class FIFO
{
    private ?Item $last = null;
    private ?Item $first = null;

    public function pop()
    {
        $item = $this->first;
        $this->first = $item->next();

        return $item->value();
    }

    public function push($value)
    {
        $item = new Item($value);
        if ($this->first === null) {
            $this->first = $item;
        }
        if ($this->last === null) {
            $this->last = $item;
        }

        $this->last->setNext($item);
        $this->last = $item;
    }
}