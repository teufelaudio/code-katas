<?php

declare(strict_types=1);

namespace GildedRose;

final class GildedRose
{
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
            if (!$this->isAgedBrie($item) && !$this->isBackstagePass($item)) {
                if (($item->quality > 0) && !$this->isSulfuras($item)) {
                    --$item->quality;
                }
            } elseif ($item->quality < 50) {
                ++$item->quality;
                if ($this->isBackstagePass($item)) {
                    if (($item->sellIn < 11) && $item->quality < 50) {
                        ++$item->quality;
                    }
                    if (($item->sellIn < 6) && $item->quality < 50) {
                        ++$item->quality;
                    }
                }
            }

            $this->processSellIn($item);

            if ($item->sellIn < 0) {
                if (!$this->isAgedBrie($item)) {
                    if (!$this->isBackstagePass($item)) {
                        if (($item->quality > 0) && !$this->isSulfuras($item)) {
                            --$item->quality;
                        }
                    } else {
                        $item->quality -= $item->quality;
                    }
                } elseif ($item->quality < 50) {
                    ++$item->quality;
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
}
