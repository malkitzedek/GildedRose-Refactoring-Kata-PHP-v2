<?php

namespace GildedRose;

class ConjuredQualityHandler extends QualityHandler
{
    /**
     * @param Item $item
     */
    public function updateQuality(Item $item): void
    {
        if ($item->quality === 0) {
            return;
        }

        if ($item->sell_in <= 0) {
            $item->quality = ($item->quality - 4 > 0) ? ($item->quality - 4) : 0;
            return;
        }

        $item->quality = ($item->quality - 2 > 0) ? ($item->quality - 2) : 0;
    }
}
