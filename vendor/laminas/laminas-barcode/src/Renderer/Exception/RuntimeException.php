<?php

declare(strict_types=1);

namespace Laminas\Barcode\Renderer\Exception;

use Laminas\Barcode\Exception;

/**
 * Exception for Laminas\Barcode component.
 */
class RuntimeException extends Exception\RuntimeException implements
    ExceptionInterface
{
}
