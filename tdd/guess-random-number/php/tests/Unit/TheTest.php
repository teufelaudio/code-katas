<?php declare(strict_types=1);

namespace KataTests\Unit;

use Kata\SlotMachine;
use PHPUnit\Framework\TestCase;

final class TheTest extends TestCase
{
    public function test_guess_number_5(): void
    {
        $slotMachine = new SlotMachine();

        self::assertTrue($slotMachine->iGuessItIsNumber(5));
    }
}
