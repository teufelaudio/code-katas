<?php declare(strict_types=1);

namespace KataTests\Unit;

use Kata\PasswordValidator\Length;
use Kata\PasswordValidator\Lowercase;
use Kata\PasswordValidator\Numbers;
use Kata\PasswordValidator\Uppercase;
use Kata\PasswordValidatorFactory;
use PHPUnit\Framework\TestCase;

final class PasswordValidatorTest extends TestCase
{
    public function test_password_character_amount(): void
    {
        $lengthValidator = new Length();

        self::assertTrue($lengthValidator->validate('123456789'));
        self::assertFalse($lengthValidator->validate('1231'));
        self::assertFalse($lengthValidator->validate(''));
        self::assertFalse($lengthValidator->validate('12345678'));
    }

    public function test_uppercase_letter(): void
    {
        $uppercaseValidator = new Uppercase();

        self::assertFalse($uppercaseValidator->validate('abc'));
        self::assertTrue($uppercaseValidator->validate('aBc'));
        self::assertTrue($uppercaseValidator->validate('ABC'));
    }

    public function test_lowercase_letter(): void
    {
        $lowercaseValidator = new Lowercase();

        self::assertTrue($lowercaseValidator->validate('abcdefghij'));
        self::assertTrue($lowercaseValidator->validate('abcdeFghij'));
        self::assertTrue($lowercaseValidator->validate('abcdeFGHIJ'));
        self::assertFalse($lowercaseValidator->validate('ABC'));
        self::assertFalse($lowercaseValidator->validate('123'));
    }

    public function test_contains_number(): void
    {
        $numberValidator = new Numbers();

        self::assertFalse($numberValidator->validate('ABC'));
        self::assertTrue($numberValidator->validate('123'));
        self::assertTrue($numberValidator->validate('A1B'));
    }

    public function test_everything_together(): void
    {
        $passwordValidator = (new PasswordValidatorFactory())->createPasswordValidator();

        self::assertTrue($passwordValidator->isValid('1231asdsadDFSKDFGJ'));
    }
}
