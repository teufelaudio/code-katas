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

    /**
     * @dataProvider provideNumbersOfThree
     */
    public function test_ensure_return_fizz_for_multiple_of_three(int $number): void
    {
        $returnValues = $this->fizzBuzz->fizzBuzz();

        self::assertEquals('fizz', $returnValues[$number-1]);
    }

    public function provideNumbersOfThree(): iterable
    {
        yield 'number 3' => [3];
        yield 'number 9' => [9];
        yield 'number 66' => [66];
        yield 'number 93' => [93];
    }

    /**
     * @dataProvider provideNumbersOfFive
     */
    public function test_ensure_return_buzz_for_multiple_of_5(int $number): void
    {
        $returnValues = $this->fizzBuzz->fizzBuzz();

        self::assertEquals('buzz', $returnValues[$number-1]);
    }

    public function provideNumbersOfFive(): iterable
    {
        yield 'number 5' => [5];
        yield 'number 20' => [20];
        yield 'number 50' => [50];
        yield 'number 95' => [95];
    }

    /**
     * @dataProvider provideNumbersOfFifteen
     */
    public function test_ensure_return_fizz_buzz_for_multiple_of_15(int $number): void
    {
        $returnValues = $this->fizzBuzz->fizzBuzz();

        self::assertEquals('fizzbuzz', $returnValues[$number - 1]);
    }

    public function provideNumbersOfFifteen(): iterable
    {
        yield 'number 15' => [15];
        yield 'number 30' => [30];
        yield 'number 45' => [45];
        yield 'number 90' => [90];
    }

    /**
     * @dataProvider provideNumbersContainingThree
     */
    public function test_ensure_return_fizz_numbers_containing_3(int $number): void
    {
        $returnValues = $this->fizzBuzz->fizzBuzz();

        self::assertEquals('fizz', $returnValues[$number - 1]);
    }

    public function provideNumbersContainingThree(): iterable
    {
        yield 'number 13' => [13];
        yield 'number 31' => [31];
        yield 'number 93' => [93];
        yield 'number 73' => [73];
    }

    /**
     * @dataProvider provideNumbersContainingFive
     */
    public function test_ensure_return_fizz_numbers_containing_5(int $number): void
    {
        $returnValues = $this->fizzBuzz->fizzBuzz();

        self::assertEquals('buzz', $returnValues[$number - 1]);
    }

    public function provideNumbersContainingFive(): iterable
    {
        yield 'number 52' => [52];
        yield 'number 59' => [59];
    }
}
