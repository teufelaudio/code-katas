<?php

declare(strict_types=1);

namespace Kata;

final class Shuffle
{
    public function __construct(
        private Randomizer $randomizer
    ) {
    }

    public function shuffleListItems(array $list): array
    {
        $sortList = $this->randomizer->createRandomNumbers(count($list));

        return $this->sortListBySortList($list, $sortList);
    }

    private function sortListBySortList(array $list, array $sortList): array
    {
        usort($list, function($a, $b) use($list, $sortList) {
            $positionA = array_search($a, $list, true);
            $positionB = array_search($b, $list, true);

            return $sortList[$positionA] <=> $sortList[$positionB];
        });

        return $list;
    }
}
