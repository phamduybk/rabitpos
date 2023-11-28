<?php

declare(strict_types=1);

namespace Laminas\Barcode\Object;

/**
 * Class for generate Ean2 barcode
 */
class Ean2 extends Ean5
{
    /** @var string[][] */
    protected $parities = [
        0 => ['A', 'A'],
        1 => ['A', 'B'],
        2 => ['B', 'A'],
        3 => ['B', 'B'],
    ];

    /**
     * Default options for Ean2 barcode
     *
     * @return void
     */
    protected function getDefaultOptions()
    {
        $this->barcodeLength = 2;
    }

    /**
     * @param int $i
     * @return string
     */
    protected function getParity($i)
    {
        $modulo = $this->getText() % 4;
        return $this->parities[$modulo][$i];
    }
}
