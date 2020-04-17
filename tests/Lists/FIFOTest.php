<?php declare(strict_types = 1);

namespace Tests\Queues;

use App\Lists\FIFO;
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

        $this->assertEquals(1, $queue->pop());
        $this->assertEquals(2, $queue->pop());
        $this->assertEquals(3, $queue->pop());
        $this->assertEquals(4, $queue->pop());
    }

    public function testALimitedWillDropTheLastElement()
    {
        $queue = new FIFO(2);

        $queue->push(1);
        $queue->push(2);
        $queue->push(3);
        $queue->push(4);

        $this->assertEquals(1, $queue->pop());
        $this->assertEquals(2, $queue->pop());
        $this->assertNull($queue->pop());
    }

    public function testALimitedWillDropTheFirstElement()
    {
        $queue = new FIFO(2, FIFO::DROP_FIRST);

        $queue->push(1);
        $queue->push(2);
        $queue->push(3);
        $queue->push(4);

        $this->assertEquals(3, $queue->pop());
        $this->assertEquals(4, $queue->pop());
        $this->assertNull($queue->pop());
    }
}
