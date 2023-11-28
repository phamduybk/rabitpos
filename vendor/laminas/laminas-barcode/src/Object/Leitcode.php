<?php

declare(strict_types=1);

namespace Laminas\Barcode\Object;

use function preg_replace;

/**
 * Class for generate Identcode barcode
 */
class Leitcode extends Identcode
{
    /**
     * Default options for Leitcode barcode
     *
     * @return void
     */
    protected function getDefaultOptions()
    {
        $this->barcodeLength     = 14;
        $this->mandatoryChecksum = true;
    }

    /**
     * Retrieve text to display
     *
     * @return string
     */
    public function getTextToDisplay()
    {
        $this->checkText($this->text);

        return preg_replace('/([0-9]{5})([0-9]{3})([0-9]{3})([0-9]{2})([0-9])/', '$1.$2.$3.$4 $5', $this->getText());
    }
}
