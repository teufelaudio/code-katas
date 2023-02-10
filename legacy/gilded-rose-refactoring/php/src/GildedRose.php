<?php

declare(strict_types=1);

namespace GildedRose;

final class GildedRose
{

    const ITEM_NAME_AGED_BRIE = 'Aged Brie';
    const SULFURAS_HAND_OF_RAGNAROS = 'Sulfuras, Hand of Ragnaros';
    const BACKSTAGE_PASSES_TO_A_TAFKAL_80_ETC_CONCERT = 'Backstage passes to a TAFKAL80ETC concert';

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
        if ($item->name !== self::ITEM_NAME_AGED_BRIE && $item->name !== self::BACKSTAGE_PASSES_TO_A_TAFKAL_80_ETC_CONCERT) {
            if ($item->quality > 0) {
                if ($item->name !== self::SULFURAS_HAND_OF_RAGNAROS) {
                    --$item->quality;
                }
            }
        } else {
            if ($item->quality < 50) {
                ++$item->quality;
                if ($item->name === self::BACKSTAGE_PASSES_TO_A_TAFKAL_80_ETC_CONCERT) {
                    if ($item->sellIn < 11) {
                        if ($item->quality < 50) {
                            ++$item->quality;
                        }
                    }
                    if ($item->sellIn < 6) {
                        if ($item->quality < 50) {
                            ++$item->quality;
                        }
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
                    if (($item->quality > 0) && $item->name !== self::SULFURAS_HAND_OF_RAGNAROS) {
                        --$item->quality;
                    }
                } else {
                    $item->quality -= $item->quality;
                }
            } else {
                if ($item->quality < 50) {
                    ++$item->quality;
                }
            }
        }
    }
}
