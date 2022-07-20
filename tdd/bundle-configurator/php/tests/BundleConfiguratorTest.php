<?php
declare(strict_types = 1);

namespace KataTests;

use Kata\BundleConfigurator;
use PHPUnit\Framework\TestCase;

final class BundleConfiguratorTest extends TestCase
{
    public function test_no_items_returns_no_items(): void
    {
        $bundleConfigurator = new BundleConfigurator();

        self::assertEquals([], $bundleConfigurator->select([]));
    }

    public function test_one_item_returns_same_item(): void
    {
        $bundleConfigurator = new BundleConfigurator();

        self::assertEquals(['P1'], $bundleConfigurator->select(['P1']));
    }

    public function test_two_items_not_in_a_bundle_returns_same_two_items(): void
    {
        $bundleConfigurator = new BundleConfigurator();

        self::assertEquals(['P1','P3'], $bundleConfigurator->select(['P1','P3']));
    }

    public function test_two_items_being_a_bundle_returns_the_bundle(): void
    {
        $bundleConfigurator = new BundleConfigurator();

        self::assertEquals(['B1'], $bundleConfigurator->select(['P1', 'P2']));
    }
}
