<?php

namespace GildedRose;

abstract class QualityHandler
{
    /**
     * @param Item $item
     */
    abstract public function updateQuality(Item $item): void;
}
