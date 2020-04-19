<?php declare(strict_types = 1);

namespace Tests\Cache;

use App\Cache\TLRU;
use PHPUnit\Framework\TestCase;

class TLRUTest extends TestCase
{
    public function testItShouldRemoveTheLRUOrExpiredItems()
    {
        $cache = new TLRU(2);

        $cache->put('key-1', 1);
        $cache->put('key-2', 2, 50);
        $cache->put('key-3', 3);

        $this->assertEquals(-1, $cache->get('key-1'));
        $this->assertEquals(2, $cache->get('key-2')); // Leave it as MRU
        usleep(50_000);
        $this->assertEquals(-1, $cache->get('key-2'));

        $cache->put('key-4', 4);
        $this->assertEquals(3, $cache->get('key-3')); // Leave it as MRU
        $cache->put('key-5', 5);
        $this->assertEquals(-1, $cache->get('key-4'));
    }
}