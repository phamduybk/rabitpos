<?php

declare(strict_types=1);

namespace Laminas\Barcode\Exception;

use InvalidArgumentException;

/**
 * Exception for Laminas\Barcode component.
 */
class RendererCreationException extends InvalidArgumentException implements ExceptionInterface
{
}
