<?php declare(strict_types=1);

namespace KataTests\Unit;

use Kata\NumberGenerator;
use Kata\NumberGeneratorInterface;
use Kata\SlotMachine;
use PHPUnit\Framework\TestCase;

final class TheTest extends TestCase
{
    public function test_guess_number_5(): void
    {
        $numberGenerator = $this->createMock(NumberGeneratorInterface::class);
        $numberGenerator
            ->method('generateRandomNumber')
            ->willReturn(5);

        $slotMachine = new SlotMachine($numberGenerator);

        self::assertTrue($slotMachine->iGuessItIsNumber(5));
    }

    public function test_guess_number_6(): void
    {
        $numberGenerator = $this->createMock(NumberGeneratorInterface::class);
        $numberGenerator
            ->method('generateRandomNumber')
            ->willReturn(6);

        $slotMachine = new SlotMachine($numberGenerator);

        self::assertTrue($slotMachine->iGuessItIsNumber(6));
    }
}
