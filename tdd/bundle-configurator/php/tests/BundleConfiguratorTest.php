<?php
declare(strict_types = 1);

namespace KataTests;

use Kata\BundleConfigurator;
use PHPUnit\Framework\TestCase;

final class BundleConfiguratorTest extends TestCase
{
    public function test_select_one_product_and_get_same_back(): void
    {
        $bundleConfigurator = new BundleConfigurator();

        self::assertSame('P1', $bundleConfigurator->select('P1'));
        self::assertSame('P2', $bundleConfigurator->select('P2'));
    }

    public function test_select_two_products_and_get_them_back(): void
    {
        $bundleConfigurator = new BundleConfigurator();

        self::assertSame('P2,P4', $bundleConfigurator->select('P2,P4'));
        self::assertSame('P2,P4', $bundleConfigurator->select('P4,P2'));
    }

    public function test_select_two_products_and_get_one_bundle_back(): void
    {
        $bundleConfigurator = new BundleConfigurator();

        self::assertSame('B1', $bundleConfigurator->select('P1,P2'));
        self::assertSame('B1', $bundleConfigurator->select('P2,P1'));
    }

    public function test_select_four_products_and_get_one_bundle_back(): void
    {
        $bundleConfigurator = new BundleConfigurator();

        self::assertSame('B4', $bundleConfigurator->select('P1,P2,P3,P4'));
        self::assertSame('B4', $bundleConfigurator->select('P4,P2,P1,P3'));
    }

//    public function test_select_three_products_and_get_one_bundle_and_one_single_product_back(): void
//    {
//        $bundleConfigurator = new BundleConfigurator();
//
//        self::assertSame('B1,P3', $bundleConfigurator->select('P1,P2,P3'));
//    }
}
