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
            $this->updateItemQuality($item);
        }
    }

    private function updateItemQuality(Item $item): void
    {
        if ($this->isAgedBrie($item) || $this->isBackstagePass($item)) {
            $this->increaseQuality($item);
        } else if (!$this->isRagnaros($item)) {
            $this->decreaseQuality($item);
        }

        $this->updateItemQualityForBackstagePasses($item);

        if (!$this->isRagnaros($item)) {
            --$item->sellIn;
        }

        $this->handlePassedSellByDate($item);
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
        if ($item->name === self::BACKSTAGE_PASSES_TO_A_TAFKAL_80_ETC_CONCERT) {
            if ($item->sellIn < 6) {
                $this->increaseQuality($item);
            }
            if ($item->sellIn < 11) {
                $this->increaseQuality($item);
            }
        }
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

    private function handlePassedSellByDate(Item $item): void
    {
        if ($this->hasValidSellByDate($item)) {
            return;
        }

        if ($this->isAgedBrie($item)) {
            $this->increaseQuality($item);
        } else if ($this->isBackstagePass($item)) {
            $item->quality = self::MIN_ITEM_QUALITY;
        }else if (!$this->isRagnaros($item)) {
            $this->decreaseQuality($item);
        }
    }

    public function hasValidSellByDate(Item $item): bool
    {
        return $item->sellIn >= 0;
    }
}
