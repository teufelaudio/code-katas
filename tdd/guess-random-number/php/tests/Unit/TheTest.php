<?php declare(strict_types=1);

namespace KataTests\Unit;

use Kata\NumberGenerator;
use Kata\NumberGeneratorInterface;
use Kata\SlotMachine;
use PHPUnit\Framework\TestCase;

final class TheTest extends TestCase
{
    private NumberGeneratorInterface $numberGenerator;
    private SlotMachine  $machine;
    public function setUp():void
    {
        $numberGenerator = $this->createMock(NumberGeneratorInterface::class);
        $this->numberGenerator = $numberGenerator;
        $numberGenerator
            ->method('generateRandomNumber')
            ->willReturn(5);

        $this->machine = new SlotMachine($numberGenerator);
    }
    public function test_guess_number_5(): void
    {

        self::assertTrue($this->machine->iGuessItIsNumber(5));
    }

    public function test_guess_lower_number_notifies_user(): void
    {
        self::assertSame(SlotMachine::LOWER_NUMBER,$this->machine->iGuessItIsNumber(4));
    }

    public function test_guess_higher_number_notifies_user(): void
    {
        self::assertSame(SlotMachine::HIGHER_NUMBER,$this->machine->iGuessItIsNumber(6));
    }
}
