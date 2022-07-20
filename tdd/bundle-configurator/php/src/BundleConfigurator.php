<?php
declare(strict_types = 1);

namespace Kata;

final class BundleConfigurator
{
    private const BUNDLES = [
        'B1' => ['P1', 'P2'],
    ];

    /**
     * @param list<string> $productNames
     * @return list<string>
     */
    public function select(array $productNames): array
    {
        $bundleProduct = array_search($productNames, self::BUNDLES);

        if ($bundleProduct) {
            return [$bundleProduct];
        }

        return $productNames;
    }
}
