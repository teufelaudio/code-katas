<?php
declare(strict_types = 1);

namespace Kata;

final class BundleConfigurator
{
    private const BUNDLES = [
        'B5' => ['P1','P5'],
        'B4' => ['P1','P2','P3','P4'],
        'B1' => ['P1','P2'],
        'B3' => ['P3','P4'], //P1,P3,P4
        'B2' => ['P1','P4'], //P1,P3,P4
        //   ->B2(40€),P3(30€)=70€
        // * ->P1(10€),B3(60€)=70€
    ];

    public function select(string $productNames): string
    {
        $products =  explode(',', $productNames);
        sort($products);

        foreach (self::BUNDLES as $bundleName => $bundleProducts) {
            if(array_diff($bundleProducts,$products) === [])
            {
                $result = $bundleName;
                if(array_diff($products, $bundleProducts) !== []) {
                    $result .= ','.implode(',', array_diff($products, $bundleProducts));
                }
                return $result;
            }
        }

        return array_search($products, self::BUNDLES, true) ?: $productNames;
    }
}
