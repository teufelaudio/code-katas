<?php

declare(strict_types = 1);

namespace GildedRose;

final class GildedRose
{

    private const ITEM_NAME_AGED_BRIE = 'Aged Brie';
    private const ITEM_NAME_SULFURAS_HAND_OF_RAGNAROS = 'Sulfuras, Hand of Ragnaros';
    private const BACKSTAGE_PASSES_TO_A_TAFKAL_80_ETC_CONCERT = 'Backstage passes to a TAFKAL80ETC concert';
    private const MAX_ITEM_QUALITY = 50;
    private const MIN_ITEM_QUALITY = 0;

    /**
     * @param Item[] $items
     */
    public function __construct(
        private array $items
    ) {
    }

    public function updateQuality(): void
    {
        foreach ($this->items as $item) {
            $this->handleSpecialQualityRules($item);
            $this->updateItemQualityForBackstagePasses($item);
            $this->calculateItemSellIn($item);
            $this->handlePassedSellByDate($item);
        }
    }

    private function increaseQuality(Item $item): void
    {
        if ($item->quality < self::MAX_ITEM_QUALITY) {
            ++$item->quality;
        }
    }

    private function decreaseQuality(Item $item): void
    {
        if ($item->quality <= self::MIN_ITEM_QUALITY) {
            return;
        }

        --$item->quality;
    }

    private function updateItemQualityForBackstagePasses(Item $item): void
    {
        if (!$this->isBackstagePass($item)) {
            return;
        }

        if ($item->sellIn <= 5) {
            $this->increaseQuality($item);
        }

        if ($item->sellIn <= 10) {
            $this->increaseQuality($item);
        }
    }

    private function handlePassedSellByDate(Item $item): void
    {
        if (!$this->isPassedSellByDate($item)) {
            return;
        }

        if ($this->isAgedBrie($item)) {
            $this->increaseQuality($item);
            return;
        }

        if ($this->isBackstagePass($item)) {
            $item->quality = self::MIN_ITEM_QUALITY;
        }

        if (!$this->isRagnaros($item)) {
            $this->decreaseQuality($item);
        }
    }

    private function handleSpecialQualityRules(Item $item): void
    {
        if ($this->isAgedBrie($item) || $this->isBackstagePass($item)) {
            $this->increaseQuality($item);
            return;
        }

        if (!$this->isRagnaros($item)) {
            $this->decreaseQuality($item);
        }
    }

    private function calculateItemSellIn(Item $item): void
    {
        if ($this->isRagnaros($item)) {
            return;
        }

        --$item->sellIn;
    }

    private function isAgedBrie(Item $item): bool
    {
        return $item->name === self::ITEM_NAME_AGED_BRIE;
    }

    private function isBackstagePass(Item $item): bool
    {
        return $item->name === self::BACKSTAGE_PASSES_TO_A_TAFKAL_80_ETC_CONCERT;
    }

    public function isRagnaros(Item $item): bool
    {
        return $item->name === self::ITEM_NAME_SULFURAS_HAND_OF_RAGNAROS;
    }

    public function isPassedSellByDate(Item $item): bool
    {
        return $item->sellIn < 0;
    }
}
