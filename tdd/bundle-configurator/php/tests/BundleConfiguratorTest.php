<?php
declare(strict_types = 1);

namespace KataTests;

use Kata\BundleConfigurator;
use PHPUnit\Framework\TestCase;

final class BundleConfiguratorTest extends TestCase
{
    public function test_select_single_product_with_one_product_p1_in_cart(): void
    {
        $bundleConfigurator = new BundleConfigurator();

        self::assertSame('P1', $bundleConfigurator->select('P1'));
    }

    public function test_select_single_product_with_one_product_p2_in_cart(): void
    {
        $bundleConfigurator = new BundleConfigurator();

        self::assertSame('P2', $bundleConfigurator->select('P2'));
    }
}
