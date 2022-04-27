<?php
declare(strict_types = 1);

namespace KataTests;

use Kata\BundleConfigurator;
use PHPUnit\Framework\TestCase;

final class BundleConfiguratorTest extends TestCase
{
    public function test_get_one_product(): void
    {
        $bundleConfigurator = new BundleConfigurator();

        self::assertSame('P1', $bundleConfigurator->select('P1'));
        self::assertSame('P2', $bundleConfigurator->select('P2'));
    }

//    public function test_get_one_product(): void
//    {
//        $bundleConfigurator = new BundleConfigurator();
//
//        self::assertSame('P1', $bundleConfigurator->select('P1'));
////        self::assertSame('P2', $bundleConfigurator->select('P2'));
////        self::assertSame('B1', $bundleConfigurator->select('P1,P2'));
////        self::assertSame('B1', $bundleConfigurator->select('P2,P1'));
//    }
}
