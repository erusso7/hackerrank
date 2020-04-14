<?php declare(strict_types = 1);

namespace Tests\Cache;

use App\Cache\LRU;
use PHPUnit\Framework\TestCase;

class LRUTest extends TestCase
{
    /** @dataProvider casesForLRU */
    public function testItShouldReturnTheLeastRecentlyUsedValue(
        $elementsToStore,
        $expectedResults
    ) {
        $cache = new LRU(2);

        foreach ($elementsToStore as $key => $value) {
            usleep(1);
            $cache->put($key, $value);
        }
        foreach ($expectedResults as $requestedKey => $expectedValue) {
            $this->assertEquals($expectedValue, $cache->get($requestedKey));
        }
    }

    public function casesForLRU()
    {
        return [
            'The cache is empty' => [
                'elements to store' => [],
                'expected results' => [
                    'random-key' => -1,
                ],
            ],
            'The cache has some element' => [
                'elements to store' => [1 => 1],
                'expected results' => [
                    1 => 1,
                ],
            ],
            'The cache is full' => [
                'elements to store' => [1 => 1, 2 => 2],
                'expected results' => [
                    1 => 1,
                    2 => 2,
                ],
            ],
            'The cache is over the capacity' => [
                'elements to store' => [1 => 1, 2 => 2, 3 => 3, 4 => 4],
                'expected results' => [
                    1 => -1,
                    2 => -1,
                    3 => 3,
                    4 => 4,
                ],
            ],
        ];
    }

    public function testItShouldKeepTheMostRecentlyUsed()
    {
        $cache = new LRU(2);

        $cache->put(1, 1);
        $cache->put(2, 2);
        $this->assertEquals(1, $cache->get(1));

        $cache->put(3, 3);
        $this->assertEquals(-1, $cache->get(2));
        $this->assertEquals(3, $cache->get(3));
        $this->assertEquals(1, $cache->get(1)); //This get will refresh the last hit.

        $cache->put(4, 4);
        $this->assertEquals(-1, $cache->get(2));
        $this->assertEquals(-1, $cache->get(3));
        $this->assertEquals(1, $cache->get(1));
        $this->assertEquals(4, $cache->get(4));
    }
}