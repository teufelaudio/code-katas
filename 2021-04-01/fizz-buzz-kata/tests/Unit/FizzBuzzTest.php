<?php

declare(strict_types = 1);

namespace KataTests\Unit;

use Generator;
use Kata\FizzBuzz;
use PHPUnit\Framework\TestCase;

/**
 * "Write a program that prints the numbers from 1 to 100.
 * But for multiples of three print “Fizz” instead of the number
 * and for the multiples of five print “Buzz”. For numbers which
 * are multiples of both three and five (15) print “FizzBuzz”.
 *
 * 1, 2, Fizz, 4, Buzz, Fizz, 7, 8, Fizz, Buzz, 11, Fizz, 13, 14,
 * Fizz Buzz, 16, 17, Fizz, 19, Buzz, Fizz, 22, 23, Fizz, Buzz,
 * 26, Fizz, 28, 29, Fizz Buzz, 31, 32, Fizz, 34, Buzz, Fizz, ...
 */
final class FizzBuzzTest extends TestCase
{
    private FizzBuzz $fizzBuzz;

    public function setUp(): void
    {
        $this->fizzBuzz = new FizzBuzz();
    }

    public function test_ensure_the_list_has_100_values(): void
    {
        self::assertCount(100, $this->fizzBuzz->values());
    }

    /**
     * @dataProvider providerNumberGetsItsRepresentationalStringValue
     */
    public function test_number_gets_its_representational_string_value_when_not_multiple_of_3_or_5(int $number, string $expected): void
    {
        self::assertSame($expected, $this->fizzBuzz->values()[$number]);
    }

    public function providerNumberGetsItsRepresentationalStringValue(): Generator
    {
        yield [1, '1'];

        yield [2, '2'];

        yield [4, '4'];
    }

    /**
     * @dataProvider providerNumberMultipleOf3GetsFizz
     */
    public function test_number_multiple_of_3_gets_fizz(int $number): void
    {
        self::assertSame('Fizz', $this->fizzBuzz->values()[$number]);
    }

    public function providerNumberMultipleOf3GetsFizz(): Generator
    {
        yield [3];

        yield [6];

        yield [9];
    }

    /**
     * @dataProvider providerNumberMultipleOf5GetsBuzz
     */
    public function test_number_multiple_of_5_gets_buzz(int $number): void
    {
        self::assertSame('Buzz', $this->fizzBuzz->values()[$number]);
    }

    public function providerNumberMultipleOf5GetsBuzz(): Generator
    {
        yield [5];

        yield [10];

        yield [20];
    }

    /**
     * @dataProvider providerNumberMultipleOf15GetsFizzBuzz
     */
    public function test_number_multiple_of_15_gets_fizz_buzz(int $number): void
    {
        self::assertSame('FizzBuzz', $this->fizzBuzz->values()[$number]);
    }

    public function providerNumberMultipleOf15GetsFizzBuzz(): Generator
    {
        yield [15];

        yield [30];

        yield [45];
    }
}
