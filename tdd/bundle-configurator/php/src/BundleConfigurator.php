<?php
declare(strict_types = 1);

namespace Kata;

final class BundleConfigurator
{
    /**
     * @param list<string> $productNames
     * @return list<string>
     */
    public function select(array $productNames): array
    {
        return $productNames;
    }
}
