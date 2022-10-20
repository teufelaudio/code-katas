<?php declare(strict_types=1);

namespace KataTests\Unit;

use Kata\NumberGeneratorInterface;
use Kata\SlotMachine;
use PHPUnit\Framework\TestCase;

final class TheTest extends TestCase
{
    private NumberGeneratorInterface $numberGenerator;
    private SlotMachine $slotMachine;

    public function setUp(): void
    {
        $numberGenerator = $this->createMock(NumberGeneratorInterface::class);
        $this->numberGenerator = $numberGenerator;
        $numberGenerator
            ->expects(self::once())
            ->method('generateRandomNumber')
            ->willReturn(5);

        $this->slotMachine = new SlotMachine($numberGenerator);
    }
    public function test_guess_number_5(): void
    {

        self::assertTrue($this->slotMachine->iGuessItIsNumber(5));
    }

    public function test_guess_lower_number_notifies_user(): void
    {
        self::assertSame(SlotMachine::LOWER_NUMBER, $this->slotMachine->iGuessItIsNumber(4));
    }

    public function test_guess_higher_number_notifies_user(): void
    {
        self::assertSame(SlotMachine::HIGHER_NUMBER, $this->slotMachine->iGuessItIsNumber(6));
    }

    public function test_guess_the_number_twice_first_is_higher_and_second_correct(): void
    {
        self::assertSame(SlotMachine::HIGHER_NUMBER, $this->slotMachine->iGuessItIsNumber(6));
        self::assertTrue($this->slotMachine->iGuessItIsNumber(5));
    }

    public function test_guess_the_number_three_times_and_all_will_fail(): void
    {
        self::assertSame(SlotMachine::HIGHER_NUMBER, $this->slotMachine->iGuessItIsNumber(6));
        self::assertSame(SlotMachine::HIGHER_NUMBER, $this->slotMachine->iGuessItIsNumber(7));
        self::assertSame(SlotMachine::LOWER_NUMBER . ' ' . SlotMachine::LOOSE_PHRASE, $this->slotMachine->iGuessItIsNumber(1));
    }
}
