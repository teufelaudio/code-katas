<?php declare(strict_types=1);

namespace KataTests\Unit;

use Kata\PasswordValidator;
use PHPUnit\Framework\TestCase;

final class PasswordValidatorTest extends TestCase
{
    public function test_password_character_amount(): void
    {
        $validator = new PasswordValidator();

        self::assertTrue($validator->isValid('123456789'));
        self::assertFalse($validator->isValid('1231'));
        self::assertFalse($validator->isValid(''));
        self::assertFalse($validator->isValid('12345678'));
    }
}
