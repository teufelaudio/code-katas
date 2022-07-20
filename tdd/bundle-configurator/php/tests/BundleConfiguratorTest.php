<?php
declare(strict_types = 1);

namespace KataTests;

use Kata\BundleConfigurator;
use PHPUnit\Framework\TestCase;

final class BundleConfiguratorTest extends TestCase
{
    public function test_select_product1_and_get_same_product_back(): void
    {
        $bundleConfigurator = new BundleConfigurator();

        self::assertSame('P1', $bundleConfigurator->select('P1'));
    }

    public function test_select_product1_and_product2_and_get_back_bundle1(): void
    {
        $bundleConfigurator = new BundleConfigurator();

        self::assertSame('B1', $bundleConfigurator->select('P1,P2'));
    }

    public function test_select_product2_and_product1_and_get_back_bundle1(): void
    {
        $bundleConfigurator = new BundleConfigurator();

        self::assertSame('B1', $bundleConfigurator->select('P2,P1'));
    }

    public function test_select_product1_and_product2_and_product3_and_get_back_bundle1_and_product3(): void
    {
        $bundleConfigurator = new BundleConfigurator();

        self::assertSame('B1,P3', $bundleConfigurator->select('P1,P2,P3'));
    }
}
