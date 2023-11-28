<?php

declare(strict_types=1);

namespace Laminas\Barcode\Object;

/**
 * Class for generate Itf14 barcode
 */
class Itf14 extends Code25interleaved
{
    /**
     * Default options for Identcode barcode
     *
     * @return void
     */
    protected function getDefaultOptions()
    {
        $this->barcodeLength     = 14;
        $this->mandatoryChecksum = true;
    }
}
