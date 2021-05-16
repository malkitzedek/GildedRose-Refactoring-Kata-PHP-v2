<?php

declare(strict_types=1);

namespace GildedRose;

final class GildedRose
{
    /**
     * @var Item[]
     */
    private array $items;

    /**
     * @param array $items
     */
    public function __construct(array $items)
    {
        $this->items = $items;
    }

    /**
     * @throws \Exception
     */
    public function updateQuality(): void
    {
        require_once __DIR__ . DIRECTORY_SEPARATOR . 'QualityHandlerProvider.php';

        foreach ($this->items as $item) {
            $this->guardItemQualityLessThan50($item);
            $this->guardItemQualityNotNegative($item);

            $itemType = $this->getItemType($item);
            $qualityHandler = QualityHandlerProvider::getQualityHandler($itemType);
            $qualityHandler->updateQuality($item);

            $item->sell_in--;

            echo $item . '<br>';
        }
    }

    /**
     * @param Item $item
     * @return string
     */
    private function getItemType(Item $item): string
    {
        if ($this->isLegendary($item)) {
            return 'legendary';
        }

        if ($this->isConjured($item)) {
            return 'conjured';
        }

        if ($item->name === 'Aged Brie') {
            return 'aged_brie';
        }

        if ($item->name === 'Backstage passes to a TAFKAL80ETC concert') {
            return 'backstage_passes';
        }

        return 'ordinary';
    }

    /**
     * @param Item $item
     * @throws \Exception
     */
    private function guardItemQualityLessThan50(Item $item): void
    {
        if ($item->quality > 50 && !$this->isLegendary($item)) {
            throw new \Exception('Item quality cannot be more than 50');
        }
    }

    /**
     * @param Item $item
     * @throws \Exception
     */
    private function guardItemQualityNotNegative(Item $item): void
    {
        if ($item->quality < 0) {
            throw new \Exception('Item quality cannot be negative');
        }
    }

    /**
     * @return string[]
     */
    private function getLegendaryItems(): array
    {
        return [
            'Sulfuras, Hand of Ragnaros',
        ];
    }

    /**
     * @param Item $item
     * @return bool
     */
    private function isLegendary(Item $item): bool
    {
        return in_array($item->name, $this->getLegendaryItems());
    }

    /**
     * @param Item $item
     * @return bool
     */
    private function isConjured(Item $item): bool
    {
        return strpos($item->name, 'Conjured') !== false;
    }
}
