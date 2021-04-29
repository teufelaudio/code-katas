<?php

declare(strict_types = 1);

namespace KataTests\Unit;

use Generator;
use Kata\Adder;
use PHPUnit\Framework\TestCase;

final class AdderTest extends TestCase
{
    public function test_empty_string(): void
    {
        self::assertSame(0, Adder::add(''));
    }

    public function test_adding_one_number(): void
    {
        self::assertSame(1, Adder::add('1'));
    }

    public function test_adding_two_numbers(): void
    {
        self::assertSame(3, Adder::add('1,2'));
    }

    public function test_adding_a_lot_of_numbers(): void
    {
        self::assertSame(15, Adder::add('1,2,3,4,5'));
        self::assertSame(5, Adder::add('1,1,1,1,1'));
    }

    public function test_handle_new_lines(): void
    {
        self::assertSame(1, Adder::add('1,\n'));
        self::assertSame(6, Adder::add('1\n2,3'));
    }

    /**
     * @dataProvider providerSupportDifferentDelimiters
     */
    public function test_support_different_delimiters(int $expected, string $input): void
    {
        self::assertSame($expected, Adder::add($input), $input);
    }

    public function providerSupportDifferentDelimiters(): Generator
    {
        yield [1, '//_\n1'];
        yield [3, '//?\n1?2'];
        yield [6, '//;\n1;2;3'];
        yield [6, '//[\n1[2[3'];
    }

    /** @dataProvider providerNegativeNumbers */
    public function test_negative_numbers_not_allowed(string $input, string $expectedException): void
    {
        $this->expectExceptionMessage($expectedException);
        Adder::add($input);
    }

    public function providerNegativeNumbers(): Generator
    {
        yield ['-1', 'negatives not allowed: -1'];
        yield ['-1,2', 'negatives not allowed: -1'];
        yield ['2,-1', 'negatives not allowed: -1'];
        yield ['-1,2,-3', 'negatives not allowed: -1,-3'];
        yield ['1,-2,-3,4', 'negatives not allowed: -2,-3'];
    }

    /** @dataProvider providerBiggerThan1000EdgeCase */
    public function test_bigger_than_1000_edge_case(string $input, int $expected): void
    {
        self::assertSame($expected, Adder::add($input));
    }

    public function providerBiggerThan1000EdgeCase(): Generator
    {
        yield ['1000', 1000];
        yield ['1001', 0];
        yield ['1000,1', 1001];
        yield ['1001,2', 2];
    }

    public function test_delimiters_with_random_length(): void
    {
        self::assertSame(6, Adder::add('//[***]\n1***2***3'));
        self::assertSame(6, Adder::add('//[?=)]\n1?=)2?=)3'));
    }

    /**
     * @dataProvider providerInvalidDelimiters
     */
    public function test_invalid_delimiters(string $input): void
    {
        $this->expectExceptionMessage('invalid delimiter');
        Adder::add($input);
    }

    public function providerInvalidDelimiters(): Generator
    {
        yield ['//]***[\n1***2***3']; # close < open
        yield ['//[]\n1***2***3'];    # open = close+1
    }
}
