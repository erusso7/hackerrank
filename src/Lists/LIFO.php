<?php declare(strict_types = 1);

namespace App\Lists;

class LIFO
{
    private ?Item $first = null;

    public function pop()
    {
        if ($this->first === null) {
            return null;
        }

        $head = $this->first;
        $this->first = $head->next();

        return $head->value();
    }

    public function push($value)
    {
        $item = new Item($value);
        if ($this->first === null) {
            $this->first = $item;

            return;
        }
        $item->setNext($this->first);
        $this->first = $item;
    }
}