<?php declare(strict_types = 1);

namespace Tests\Lists;

use App\Lists\LIFO;
use PHPUnit\Framework\TestCase;

class LIFOTest extends TestCase
{
    public function testTheQueueIsEmpty()
    {
        $stack = new LIFO;
        $this->assertNull($stack->pop());
    }

    public function testTheStackReturnsTheCorrectElement()
    {
        $stack = new LIFO;

        $stack->push(1);
        $stack->push(2);
        $stack->push(3);
        $stack->push(4);

        $this->assertSame(4, $stack->pop());
        $this->assertSame(3, $stack->pop());
        $this->assertSame(2, $stack->pop());
        $this->assertSame(1, $stack->pop());
    }
}