<?php

namespace GildedRose;

class AgedBrieQualityHandler extends QualityHandler
{
    /**
     * Вообще не понял, что означает фраза: "качество увеличивается пропорционально возрасту"
     * Скорее всего, некорректный перевод в файле GildedRoseRequirements_ru.txt
     * Нужно уточнение от составителя ТЗ
     *
     * @param Item $item
     */
    public function updateQuality(Item $item): void
    {
        if ($item->quality === 50) {
            return;
        }

        if ($item->sell_in <= 0) {
            $item->quality = ($item->quality + 2 < 50) ? ($item->quality + 2) : 50;
            return;
        }

        $item->quality++;
    }
}
