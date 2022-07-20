<?php
declare(strict_types = 1);

namespace Kata;

final class BundleConfigurator
{
    private const BUNDLES = [
        'B1' => ['P1', 'P2'],
        'B2' => ['P1', 'P4'],
        'B3' => ['P3', 'P4'],
        'B5' => ['P1', 'P5'],
    ];

    /**
     * @param list<string> $productNames
     * @return list<string>
     */
    public function select(array $productNames): array
    {
        sort($productNames);

        $bundleNames = [];

        foreach (self::BUNDLES as $bundleName => $bundleContent) {
            if ($this->checkBundlesContainsProducts($productNames, $bundleContent)) {
                $productNames = array_diff($productNames, $bundleContent);

                $bundleNames[] = $bundleName;
            }
        }

        return array_merge($bundleNames, $productNames);
    }

    private function checkBundlesContainsProducts(array $products, array $bundleContent): bool
    {
        $intersection = array_intersect($products, $bundleContent);

        return array_values($intersection) === array_values($bundleContent);
    }
}
