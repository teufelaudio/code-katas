<?php

declare(strict_types = 1);

namespace GildedRose;

final class GildedRose
{

    private const ITEM_NAME_AGED_BRIE = 'Aged Brie';
    private const ITEM_NAME_SULFURAS_HAND_OF_RAGNAROS = 'Sulfuras, Hand of Ragnaros';
    private const BACKSTAGE_PASSES_TO_A_TAFKAL_80_ETC_CONCERT = 'Backstage passes to a TAFKAL80ETC concert';
    private const MAX_ITEM_QUALITY = 50;

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
        if (in_array($item->name, [self::ITEM_NAME_AGED_BRIE, self::BACKSTAGE_PASSES_TO_A_TAFKAL_80_ETC_CONCERT])) {
            $this->increaseQuality($item);
        } else {
            $this->decreaseQuality($item);
        }

        $this->updateItemQualityForBackstagePasses($item);

        if ($item->name !== self::ITEM_NAME_SULFURAS_HAND_OF_RAGNAROS) {
            --$item->sellIn;
        }

        if ($item->sellIn < 0) {
            if ($item->name === self::ITEM_NAME_AGED_BRIE) {
                $this->increaseQuality($item);
            } else if ($item->name === self::BACKSTAGE_PASSES_TO_A_TAFKAL_80_ETC_CONCERT) {
                $item->quality = 0;
            } else {
                $this->decreaseQuality($item);
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
        if ($item->quality <= 0) {
            return;
        }

        if ($item->name === self::ITEM_NAME_SULFURAS_HAND_OF_RAGNAROS) {
            return;
        }

        --$item->quality;
    }

    public function updateItemQualityForBackstagePasses(Item $item): void
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
}
