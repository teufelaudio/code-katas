<?php

declare(strict_types=1);

namespace GildedRose;

final class GildedRose
{
    private const MAX_QUALITY = 50;
    private const MIN_QUALITY = 0;

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

            if (!$this->isAgedBrie($item) && !$this->isBackstagePass($item)) {
                $this->decreaseQuality($item);
            } else {
                $this->increaseQuality($item);
            }

            $this->processSellIn($item);

            if ($item->sellIn < 0) {
                if (!$this->isAgedBrie($item) && $this->isBackstagePass($item)) {
                    $item->quality = self::MIN_QUALITY;
                }

                if ($this->isAgedBrie($item)) {
                    $this->increaseQuality($item);
                }

                if (!$this->isAgedBrie($item) && !$this->isBackstagePass($item)) {
                    $this->decreaseQuality($item);
                }
            }
        }
    }

    private function processSellIn(Item $item): void
    {
        if ($item->name !== 'Sulfuras, Hand of Ragnaros') {
            --$item->sellIn;
        }
    }

    private function isBackstagePass(Item $item): bool
    {
        return $item->name === 'Backstage passes to a TAFKAL80ETC concert';
    }

    private function isAgedBrie(Item $item): bool
    {
        return $item->name === 'Aged Brie';
    }

    private function isSulfuras(Item $item): bool
    {
        return $item->name === 'Sulfuras, Hand of Ragnaros';
    }

    private function increaseQuality(Item $item): void
    {
        if($item->quality < self::MAX_QUALITY) {
            $item->quality++;
        }
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
        if ($this->isBackstagePass($item)) {
            if ($item->sellIn < 6) {
                $this->increaseQuality($item);
                $this->increaseQuality($item);
            } elseif ($item->sellIn < 11) {
                $this->increaseQuality($item);
            }
        }
    }
}
