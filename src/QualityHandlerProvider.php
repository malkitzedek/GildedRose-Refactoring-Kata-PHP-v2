<?php

namespace GildedRose;

require_once __DIR__ . DIRECTORY_SEPARATOR . 'QualityHandler.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . 'LegendaryQualityHandler.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . 'ConjuredQualityHandler.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . 'AgedBrieQualityHandler.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . 'BackstagePassesQualityHandler.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . 'OrdinaryQualityHandler.php';

class QualityHandlerProvider
{
    /**
     * @param string $type
     * @return QualityHandler
     */
    public static function getQualityHandler(string $type): QualityHandler
    {
        switch ($type) {
            case 'legendary':
                return new LegendaryQualityHandler();
            case 'conjured':
                return new ConjuredQualityHandler();
            case 'aged_brie':
                return new AgedBrieQualityHandler();
            case 'backstage_passes':
                return new BackstagePassesQualityHandler();
            default:
                return new OrdinaryQualityHandler();
        }
    }
}
