<?php

declare(strict_types=1);

namespace KataTests\Unit;

use Kata\Randomizer;
use Kata\Shuffle;
use PHPUnit\Framework\TestCase;

final class ShuffleTest extends TestCase
{
    private Shuffle $shuffle;

    protected function setUp(): void
    {
        $this->shuffle = new Shuffle(new Randomizer());
    }

    public function test_shuffle_empty_list(): void
    {
        self::assertEmpty($this->shuffle->shuffleListItems([]));
    }

    public function test_shuffle_list_with_one_item(): void
    {
        self::assertEquals([1], $this->shuffle->shuffleListItems([1]));
    }

    public function test_shuffle_list_with_two_items(): void
    {
        self::assertEquals([2,1], $this->shuffle->shuffleListItems([1,2]));
    }
}
