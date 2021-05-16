<?php

namespace GildedRose;

class BackstagePassesQualityHandler extends QualityHandler
{
    /**
     * @param Item $item
     */
    public function updateQuality(Item $item): void
    {
        if ($item->sell_in < 0) {
            $item->quality = 0;
            return;
        }

        if ($item->quality === 50) {
            return;
        }

        if ($item->sell_in <= 5) {
            $item->quality = ($item->quality + 3 < 50) ? ($item->quality + 3) : 50;
            return;
        }


        if ($item->sell_in <= 10) {
            $item->quality = ($item->quality + 2 < 50) ? ($item->quality + 2) : 50;
            return;
        }

        $item->quality++;
    }
}
