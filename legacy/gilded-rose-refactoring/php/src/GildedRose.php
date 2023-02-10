<?php

declare(strict_types=1);

namespace GildedRose;

final class GildedRose
{
    private const MAX_QUALITY = 50;
    private const MIN_QUALITY = 0;
    private const MIN_SELL_IN = 0;
    private const NAME_SULFURAS = 'Sulfuras, Hand of Ragnaros';
    private const NAME_BACKSTAGE_PASS = 'Backstage passes to a TAFKAL80ETC concert';
    private const NAME_AGED_BRIE = 'Aged Brie';

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

            $this->processBackstagePass($item);
            $this->processSellIn($item);
            $this->processQuality($item);
            $this->processNotSellable($item);
        }
    }

    private function processSellIn(Item $item): void
    {
        if ($item->name !== self::NAME_SULFURAS) {
            --$item->sellIn;
        }
    }

    private function isBackstagePass(Item $item): bool
    {
        return $item->name === self::NAME_BACKSTAGE_PASS;
    }

    private function isAgedBrie(Item $item): bool
    {
        return $item->name === self::NAME_AGED_BRIE;
    }

    private function isSulfuras(Item $item): bool
    {
        return $item->name === self::NAME_SULFURAS;
    }

    private function increaseQuality(Item $item): void
    {
        if ($item->quality < self::MAX_QUALITY) {
            $item->quality++;
        }
    }

    private function increaseQualityTwice(Item $item): void
    {
        $this->increaseQuality($item);
        $this->increaseQuality($item);
    }

    private function decreaseQuality(Item $item): void
    {
        if ($this->isSulfuras($item)) {
            return;
        }

        if ($item->quality > self::MIN_QUALITY) {
            $item->quality--;
        }
    }

    private function processBackstagePass(Item $item): void
    {
        if (!$this->isBackstagePass($item)) {
            return;
        }

        match (true) {
            $item->sellIn < 6 => $this->increaseQualityTwice($item),
            $item->sellIn < 11 => $this->increaseQuality($item),
            default => false,
        };
    }

    private function isQualityDecreasable(Item $item): bool
    {
        return !$this->isAgedBrie($item) && !$this->isBackstagePass($item);
    }

    private function processQuality(Item $item): void
    {
        if ($this->isQualityDecreasable($item)) {
            $this->decreaseQuality($item);
        } else {
            $this->increaseQuality($item);
        }
    }

    private function processNotSellable(Item $item): void
    {
        if ($item->sellIn >= self::MIN_SELL_IN) {
            return;
        }

        if (!$this->isAgedBrie($item) && $this->isBackstagePass($item)) {
            $item->quality = self::MIN_QUALITY;
        }

        if ($this->isAgedBrie($item)) {
            $this->increaseQuality($item);
        }

        if ($this->isQualityDecreasable($item)) {
            $this->decreaseQuality($item);
        }
    }
}
