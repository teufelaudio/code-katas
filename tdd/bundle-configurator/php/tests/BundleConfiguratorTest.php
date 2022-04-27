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

    public function test_two_products_p1_p2_in_cart(): void
    {
        $bundleConfigurator = new BundleConfigurator();

        self::assertSame('B1', $bundleConfigurator->select('P1,P2'));
    }

    public function test_two_products_p1_p2_in_cart_in_switched_order(): void
    {
        $bundleConfigurator = new BundleConfigurator();

        self::assertSame('B1', $bundleConfigurator->select('P2,P1'));
    }
}
