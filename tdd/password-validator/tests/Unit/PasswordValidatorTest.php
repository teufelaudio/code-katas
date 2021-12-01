<?php declare(strict_types=1);

namespace KataTests\Unit;

use Kata\PasswordValidator;
use PHPUnit\Framework\TestCase;

final class PasswordValidatorTest extends TestCase
{
    public function test_fail_on_length_less_than_8(): void
    {
        $validator = new PasswordValidator();

        self::assertFalse($validator->validatePassword('abc'));
    }

    public function test_fail_on_missing_uppercase_letter(): void
    {
        $validator = new PasswordValidator();

        self::assertFalse($validator->validatePassword('abcdefgh'));
    }

    public function test_fail_on_missing_lowercase_letter(): void
    {
        $validator = new PasswordValidator();

        self::assertFalse($validator->validatePassword('AAAAAAAA'));
    }

    public function test_fail_on_missing_digit(): void
    {
        $validator = new PasswordValidator();

        self::assertFalse($validator->validatePassword('aBcdefgh'));
    }

    public function test_fail_on_missing_underscore(): void
    {
        $validator = new PasswordValidator();

        self::assertFalse($validator->validatePassword('aBcdefg1'));
    }

    public function test_return_true_on_valid_password(): void
    {
        $validator = new PasswordValidator();

        self::assertTrue($validator->validatePassword('aB3_efgh'));
    }
}
