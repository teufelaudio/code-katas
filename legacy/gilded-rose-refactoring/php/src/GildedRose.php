<?php

declare(strict_types = 1);

namespace GildedRose;

final class GildedRose
{

    const ITEM_NAME_AGED_BRIE = 'Aged Brie';
    const SULFURAS_HAND_OF_RAGNAROS = 'Sulfuras, Hand of Ragnaros';
    const BACKSTAGE_PASSES_TO_A_TAFKAL_80_ETC_CONCERT = 'Backstage passes to a TAFKAL80ETC concert';
    const MAX_ITEM_QUALITY = 50;

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

    public function updateItemQuality(Item $item): void
    {
        if (!in_array($item->name, [self::ITEM_NAME_AGED_BRIE, self::BACKSTAGE_PASSES_TO_A_TAFKAL_80_ETC_CONCERT])) {
            if ($item->name !== self::SULFURAS_HAND_OF_RAGNAROS) {
                $this->decreaseQuality($item);
            }
        } else {
            if ($item->quality < self::MAX_ITEM_QUALITY) {
                ++$item->quality;
                if ($item->name === self::BACKSTAGE_PASSES_TO_A_TAFKAL_80_ETC_CONCERT) {
                    if ($item->sellIn < 11) {
                        $this->increaseQuality($item);
                    }
                    if ($item->sellIn < 6) {
                        $this->increaseQuality($item);
                    }
                }
            }
        }

        if ($item->name !== self::SULFURAS_HAND_OF_RAGNAROS) {
            --$item->sellIn;
        }

        if ($item->sellIn < 0) {
            if ($item->name !== self::ITEM_NAME_AGED_BRIE) {
                if ($item->name !== self::BACKSTAGE_PASSES_TO_A_TAFKAL_80_ETC_CONCERT) {
                    if ($item->name !== self::SULFURAS_HAND_OF_RAGNAROS) {
                        $this->decreaseQuality($item);
                    }
                } else {
                    $item->quality -= $item->quality;
                }
            } else {
                $this->increaseQuality($item);
            }
        }
    }

    public function increaseQuality(Item $item): void
    {
        if ($item->quality < self::MAX_ITEM_QUALITY) {
            ++$item->quality;
        }
    }

    public function decreaseQuality(Item $item): void
    {
        if ($item->quality > 0) {
            --$item->quality;
        }
    }
}
