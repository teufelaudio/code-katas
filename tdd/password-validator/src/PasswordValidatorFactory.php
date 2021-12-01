<?php

declare(strict_types = 1);


namespace Kata;


use Kata\PasswordValidator\Length;
use Kata\PasswordValidator\Lowercase;
use Kata\PasswordValidator\Numbers;
use Kata\PasswordValidator\Uppercase;
use Kata\PasswordValidator\ValidatorInterface;

final class PasswordValidatorFactory
{
    public function createPasswordValidator(): PasswordValidator
    {
        return new PasswordValidator([
            $this->createPasswordLengthValidator(),
            $this->createPasswordLowercaseValidator(),
            $this->createPasswordNumbersValidator(),
            $this->createPasswordUppercaseValidator(),
        ]);
    }

    private function createPasswordLengthValidator(): ValidatorInterface
    {
        return new Length();
    }

    private function createPasswordLowercaseValidator(): ValidatorInterface
    {
        return new Lowercase();
    }

    private function createPasswordNumbersValidator(): ValidatorInterface
    {
        return new Numbers();
    }

    private function createPasswordUppercaseValidator(): ValidatorInterface
    {
        return new Uppercase();
    }
}