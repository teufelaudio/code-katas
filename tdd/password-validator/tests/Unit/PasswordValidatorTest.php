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
        self::assertFalse($this->validator->validatePassword('aB3_'));
    }

    public function test_reject_missing_uppercase_letter(): void
    {
        self::assertFalse($this->validator->validatePassword('ab3_defgh'));
    }

    public function test_reject_missing_lowercase_letter(): void
    {
        self::assertFalse($this->validator->validatePassword('AB3_DEFGH'));
    }

    public function test_reject_missing_digit(): void
    {
        self::assertFalse($this->validator->validatePassword('aBc_efgh'));
    }

    public function test_reject_missing_underscore(): void
    {
        self::assertFalse($this->validator->validatePassword('aB3defgh'));
    }

    public function test_accept_valid_password(): void
    {
        self::assertTrue($this->validator->validatePassword('aB3_efgh'));
    }
}
