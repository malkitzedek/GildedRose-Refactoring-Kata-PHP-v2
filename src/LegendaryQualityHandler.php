<?php

namespace GildedRose;

class LegendaryQualityHandler extends QualityHandler
{
    /**
     * @param Item $item
     */
    public function updateQuality(Item $item): void
    {
        // ничего не делаем со свойством $item->quality легендарного товара
    }
}
