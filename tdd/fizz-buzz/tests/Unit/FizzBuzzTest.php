<?php declare(strict_types=1);

namespace KataTests\Unit;

use Kata\FizzBuzz;
use PHPUnit\Framework\TestCase;

final class FizzBuzzTest extends TestCase
{
    private FizzBuzz $fizzBuzz;

    protected function setUp(): void
    {
        $this->fizzBuzz = new FizzBuzz();
    }

    public function test_ensure_the_list_has_100_values(): void
    {
        $returnValues = $this->fizzBuzz->fizzBuzz();

        self::assertCount(100, $returnValues);
    }

    public function test_ensure_return_number_1_for_first_number(): void
    {
        $returnValues = $this->fizzBuzz->fizzBuzz();

        self::assertEquals(1, $returnValues[0]);
    }

    public function test_ensure_return_number_2_for_second_number(): void
    {
        $returnValues = $this->fizzBuzz->fizzBuzz();

        self::assertEquals(2, $returnValues[1]);
    }
}
