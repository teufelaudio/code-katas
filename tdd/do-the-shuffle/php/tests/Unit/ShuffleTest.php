<?php declare(strict_types=1);

namespace KataTests\Unit;

use Kata\Shuffle;
use PHPUnit\Framework\TestCase;

final class ShuffleTest extends TestCase
{
    public function test_shuffle_empty_list(): void
    {
        $shuffle = new Shuffle();

        self::assertEmpty($shuffle->shuffleListItems([]));
    }
}
