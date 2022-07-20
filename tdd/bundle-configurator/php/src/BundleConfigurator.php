<?php
declare(strict_types = 1);

namespace Kata;

final class BundleConfigurator
{
    private const BUNDLES = [
        'B1' => ['P1', 'P2'],
        'B2' => ['P1', 'P4'],
    ];

    /**
     * @param list<string> $productNames
     * @return list<string>
     */
    public function select(array $productNames): array
    {
        sort($productNames);

        foreach (self::BUNDLES as $bundleName => $bundleContent) {
            $intersection = array_intersect($productNames, $bundleContent);

            if ($intersection === $bundleContent) {
                $remainingProducts = array_diff($productNames, $bundleContent);

                return array_merge([$bundleName], $remainingProducts);
            }
        }

        return $productNames;
    }
}
