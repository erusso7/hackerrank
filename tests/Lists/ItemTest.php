<?php declare(strict_types = 1);

namespace Tests\Lists;

use App\Lists\Item;
use PHPUnit\Framework\TestCase;

class ItemTest extends TestCase
{
    public function testItShouldPrependOtherItem()
    {
        $first = new Item(1, 'key-1');
        $second = new Item(2, 'key-2');

        $first->prepend($second);

        $this->assertSame($second, $first->next());
        $this->assertSame($first, $second->prev());
    }

    public function testItShouldAppendOtherItem()
    {
        $first = new Item(1, 'key-1');
        $second = new Item(2, 'key-2');

        $first->append($second);

        $this->assertSame($second, $first->prev());
        $this->assertSame($first, $second->next());
    }

    public function testItShouldKnowIfItIsExpired()
    {
        $now = microtime(true);

        $valid = new Item(1, 'key-1', $now + 1000);
        $this->assertFalse($valid->isExpired());

        $expired = new Item(2, 'key-2', $now - 1000);
        $this->assertTrue($expired->isExpired());
    }
}
