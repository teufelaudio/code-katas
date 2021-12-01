<?php declare(strict_types=1);

namespace KataTests\Unit;

use Kata\PasswordValidator;
use PHPUnit\Framework\TestCase;

final class PasswordValidatorTest extends TestCase
{
    public function test_return_false_on_length_less_than_8(): void
    {
        $validator = new PasswordValidator();

        self::assertFalse($validator->validatePassword('abc'));
    }

    public function test_return_true_on_length_greater_or_equal_8(): void
    {
        $validator = new PasswordValidator();

        self::assertTrue($validator->validatePassword('Abcdefgh'));
    }

    public function test_return_false_on_missing_uppercase_letter(): void
    {
        $validator = new PasswordValidator();

        self::assertFalse($validator->validatePassword('abcdefgh'));
    }
}
