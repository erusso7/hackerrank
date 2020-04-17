<?php declare(strict_types = 1);

namespace Tests\Queues;

use App\Queues\FIFO;
use PHPUnit\Framework\TestCase;

class FIFOTest extends TestCase
{
    public function testTheQueueIsEmpty()
    {
        $queue = new FIFO;
        $this->assertNull($queue->pop());
    }

    public function testTheQueueReturnsTheCorrectElement()
    {
        $queue = new FIFO;

        $queue->push(1);
        $queue->push(2);
        $queue->push(3);
        $queue->push(4);

        $this->assertSame(1, $queue->pop());
        $this->assertSame(2, $queue->pop());
        $this->assertSame(3, $queue->pop());
        $this->assertSame(4, $queue->pop());
    }
}
