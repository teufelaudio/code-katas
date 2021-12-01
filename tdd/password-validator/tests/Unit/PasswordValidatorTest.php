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

    public function test_reject_length_less_than_8(): void
    {
        self::assertFalse($this->validator->validatePassword('abc'));
    }

    public function test_reject_missing_uppercase_letter(): void
    {
        self::assertFalse($this->validator->validatePassword('a1_defgh'));
    }

    public function test_reject_missing_lowercase_letter(): void
    {
        self::assertFalse($this->validator->validatePassword('A1_AAAAA'));
    }

    public function test_reject_missing_digit(): void
    {
        self::assertFalse($this->validator->validatePassword('aBcdefgh'));
    }

    public function test_reject_missing_underscore(): void
    {
        self::assertFalse($this->validator->validatePassword('aBcdefg1'));
    }

    public function test_accept_valid_password(): void
    {
        self::assertTrue($this->validator->validatePassword('aB3_efgh'));
    }
}
