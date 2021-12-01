<?php declare(strict_types=1);

namespace KataTests\Unit;

use Kata\PasswordValidator;
use PHPUnit\Framework\TestCase;

final class PasswordValidatorTest extends TestCase
{
    private PasswordValidator $validator;

    protected function setUp(): void
    {
        $this->validator = new PasswordValidator();
    }

    public function test_fail_on_length_less_than_8(): void
    {
        self::assertFalse($this->validator->validatePassword('abc'));
    }

    public function test_fail_on_missing_uppercase_letter(): void
    {
        self::assertFalse($this->validator->validatePassword('abcdefgh'));
    }

    public function test_fail_on_missing_lowercase_letter(): void
    {
        self::assertFalse($this->validator->validatePassword('AAAAAAAA'));
    }

    public function test_fail_on_missing_digit(): void
    {
        self::assertFalse($this->validator->validatePassword('aBcdefgh'));
    }

    public function test_fail_on_missing_underscore(): void
    {
        self::assertFalse($this->validator->validatePassword('aBcdefg1'));
    }

    public function test_valid_password(): void
    {
        self::assertTrue($this->validator->validatePassword('aB3_efgh'));
    }
}
