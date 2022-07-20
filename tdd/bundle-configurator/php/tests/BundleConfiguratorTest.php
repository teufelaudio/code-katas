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
        self::assertEquals(['B2'], $bundleConfigurator->select(['P1', 'P4']));
    }

    public function test_two_items_in_reverse_order_being_a_bundle_returns_the_bundle(): void
    {
        $bundleConfigurator = new BundleConfigurator();

        self::assertEquals(['B1'], $bundleConfigurator->select(['P2', 'P1']));
    }

    public function test_multiple_items_with_some_being_a_bundle_returns_the_bundle_and_remaining_products(): void
    {
        $bundleConfigurator = new BundleConfigurator();

        self::assertEquals(['B1', 'P3'], $bundleConfigurator->select(['P1', 'P2', 'P3']));
    }

    public function test_multiple_items_having_two_bundles_returns_the_two_bundles(): void
    {
        $bundleConfigurator = new BundleConfigurator();

        self::assertEquals(['B1', 'B3'], $bundleConfigurator->select(['P1', 'P2', 'P3', 'P4']));
    }
}
