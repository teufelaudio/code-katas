<?php
declare(strict_types = 1);

namespace Kata;

final class BundleConfigurator
{
    private const BUNDLES = [
        'B1' => 'P1,P2',
        'B2' => 'P1,P4',
        'B3' => 'P3,P4',
        'B4' => 'P1,P2,P3,P4',
        'B5' => 'P1,P5',
    ];

    public function select(string $productNames): string
    {
        return array_search($productNames, self::BUNDLES) ?: $productNames;
    }
}
