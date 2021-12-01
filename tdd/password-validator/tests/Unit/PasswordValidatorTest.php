<?php declare(strict_types=1);

namespace KataTests\Unit;

use Kata\PasswordValidator;
use PHPUnit\Framework\TestCase;

final class PasswordValidatorTest extends TestCase
{
    public function test_password_character_amount(): void
    {
        $validator = new PasswordValidator();

        self::assertTrue($validator->validateAmountOfCharacters('123456789'));
        self::assertFalse($validator->validateAmountOfCharacters('1231'));
        self::assertFalse($validator->validateAmountOfCharacters(''));
        self::assertFalse($validator->validateAmountOfCharacters('12345678'));
    }

    public function test_uppercase_letter(): void
    {
        $validator = new PasswordValidator();

        self::assertFalse($validator->validateUppercaseLetter('abc'));
        self::assertTrue($validator->validateUppercaseLetter('aBc'));
        self::assertTrue($validator->validateUppercaseLetter('ABC'));
    }

    public function test_lowercase_letter(): void
    {
        $validator = new PasswordValidator();

        self::assertTrue($validator->validateLowercaseLetter('abcdefghij'));
        self::assertTrue($validator->validateLowercaseLetter('abcdeFghij'));
        self::assertTrue($validator->validateLowercaseLetter('abcdeFGHIJ'));
        self::assertFalse($validator->validateLowercaseLetter('ABC'));
        self::assertFalse($validator->validateLowercaseLetter('123'));
    }


}
