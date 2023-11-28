<?php

declare(strict_types=1);

namespace Laminas\Barcode\Renderer;

use GdImage;
use Laminas\Barcode\Exception\RendererCreationException;
use Laminas\Stdlib\ErrorHandler;
use Traversable;

use function ceil;
use function cos;
use function function_exists;
use function get_resource_type;
use function gettype;
use function header;
use function imagecolorallocate;
use function imagecolortransparent;
use function imagecreatetruecolor;
use function imagedestroy;
use function imagefilledpolygon;
use function imagefilledrectangle;
use function imagefontheight;
use function imagefontwidth;
use function imagepolygon;
use function imagestring;
use function imagesx;
use function imagesy;
use function imagettfbbox;
use function imagettftext;
use function in_array;
use function intval;
use function is_numeric;
use function pi;
use function sin;
use function sprintf;
use function strlen;

use const E_WARNING;
use const PHP_MAJOR_VERSION;
use const PHP_VERSION_ID;

/**
 * Class for rendering the barcode as image
 */
class Image extends AbstractRenderer
{
    /**
     * List of authorized output format
     *
     * @var array
     */
    protected $allowedImageType = [
        'png',
        'jpeg',
        'gif',
    ];

    /**
     * Image format
     *
     * @var string
     */
    protected $imageType = 'png';

    /**
     * Resource for the image
     *
     * @var resource
     */
    protected $resource;

    /**
     * Resource for the font and bars color of the image
     *
     * @var int
     */
    protected $imageForeColor;

    /**
     * Resource for the background color of the image
     *
     * @var int
     */
    protected $imageBackgroundColor;

    /**
     * Height of the rendered image wanted by user
     *
     * @var int
     */
    protected $userHeight = 0;

    /**
     * Width of the rendered image wanted by user
     *
     * @var int
     */
    protected $userWidth = 0;

    /**
     * Constructor
     *
     * @param array|Traversable $options
     * @throws RendererCreationException
     */
    public function __construct($options = null)
    {
        if (! function_exists('gd_info')) {
            throw new RendererCreationException(self::class . ' requires the GD extension');
        }

        parent::__construct($options);
    }

    /**
     * Set height of the result image
     *
     * @param null|int $value
     * @return self Provides a fluent interface
     * @throws Exception\OutOfRangeException
     */
    public function setHeight($value)
    {
        if (! is_numeric($value) || intval($value) < 0) {
            throw new Exception\OutOfRangeException(
                'Image height must be greater than or equals 0'
            );
        }
        $this->userHeight = intval($value);

        return $this;
    }

    /**
     * Get barcode height
     *
     * @return int
     */
    public function getHeight()
    {
        return $this->userHeight;
    }

    /**
     * Set barcode width
     *
     * @param mixed $value
     * @return self Provides a fluent interface
     * @throws Exception\OutOfRangeException
     */
    public function setWidth($value)
    {
        if (! is_numeric($value) || intval($value) < 0) {
            throw new Exception\OutOfRangeException(
                'Image width must be greater than or equals 0'
            );
        }
        $this->userWidth = intval($value);

        return $this;
    }

    /**
     * Get barcode width
     *
     * @return int
     */
    public function getWidth()
    {
        return $this->userWidth;
    }

    /**
     * Set an image resource to draw the barcode inside
     *
     * @param resource $image
     * @return self Provides a fluent interface
     * @throws Exception\InvalidArgumentException
     */
    public function setResource($image)
    {
        if (! $this->isGdImage($image)) {
            throw new Exception\InvalidArgumentException(
                'Invalid image resource provided to setResource()'
            );
        }
        $this->resource = $image;

        return $this;
    }

    /**
     * Set the image type to produce (png, jpeg, gif)
     *
     * @param string $value
     * @return self Provides a fluent interface
     * @throws Exception\InvalidArgumentException
     */
    public function setImageType($value)
    {
        if ($value === 'jpg') {
            $value = 'jpeg';
        }

        if (! in_array($value, $this->allowedImageType)) {
            throw new Exception\InvalidArgumentException(
                sprintf(
                    'Invalid type "%s" provided to setImageType()',
                    $value
                )
            );
        }

        $this->imageType = $value;

        return $this;
    }

    /**
     * Retrieve the image type to produce
     *
     * @return string
     */
    public function getImageType()
    {
        return $this->imageType;
    }

    /**
     * Initialize the image resource
     *
     * @return void
     */
    protected function initRenderer()
    {
        $barcodeWidth  = $this->barcode->getWidth(true);
        $barcodeHeight = $this->barcode->getHeight(true);

        if (null === $this->resource) {
            $width  = $barcodeWidth;
            $height = $barcodeHeight;
            if ($this->userWidth && $this->barcode->getType() !== 'error') {
                $width = $this->userWidth;
            }
            if ($this->userHeight && $this->barcode->getType() !== 'error') {
                $height = $this->userHeight;
            }

            // Cast width and height to ensure they are correct type for image
            // operations
            $width  = (int) $width;
            $height = (int) $height;

            $this->resource = imagecreatetruecolor($width, $height);

            $white = imagecolorallocate($this->resource, 255, 255, 255);
            imagefilledrectangle($this->resource, 0, 0, $width - 1, $height - 1, $white);
        }

        $foreColor            = $this->barcode->getForeColor();
        $this->imageForeColor = imagecolorallocate(
            $this->resource,
            ($foreColor & 0xFF0000) >> 16,
            ($foreColor & 0x00FF00) >> 8,
            $foreColor & 0x0000FF
        );

        $backgroundColor            = $this->barcode->getBackgroundColor();
        $this->imageBackgroundColor = imagecolorallocate(
            $this->resource,
            ($backgroundColor & 0xFF0000) >> 16,
            ($backgroundColor & 0x00FF00) >> 8,
            $backgroundColor & 0x0000FF
        );

        // JPEG does not support transparency, if transparentBackground is true and
        // image type is JPEG, ignore transparency
        if ($this->getImageType() !== "jpeg" && $this->transparentBackground) {
            imagecolortransparent($this->resource, $this->imageBackgroundColor);
        }

        $this->adjustPosition(imagesy($this->resource), imagesx($this->resource));

        imagefilledrectangle(
            $this->resource,
            (int) $this->leftOffset,
            (int) $this->topOffset,
            (int) ($this->leftOffset + $barcodeWidth - 1),
            (int) ($this->topOffset + $barcodeHeight - 1),
            $this->imageBackgroundColor
        );
    }

    /**
     * Check barcode parameters
     *
     * @return void
     */
    protected function checkSpecificParams()
    {
        $this->checkDimensions();
    }

    /**
     * Check barcode dimensions
     *
     * @return void
     * @throws Exception\RuntimeException
     */
    protected function checkDimensions()
    {
        if ($this->resource !== null) {
            if (imagesy($this->resource) < $this->barcode->getHeight(true)) {
                throw new Exception\RuntimeException(
                    'Barcode is define outside the image (height)'
                );
            }
        } else {
            if ($this->userHeight) {
                $height = $this->barcode->getHeight(true);
                if ($this->userHeight < $height) {
                    throw new Exception\RuntimeException(
                        sprintf(
                            "Barcode is define outside the image (calculated: '%d', provided: '%d')",
                            $height,
                            $this->userHeight
                        )
                    );
                }
            }
        }
        if ($this->resource !== null) {
            if (imagesx($this->resource) < $this->barcode->getWidth(true)) {
                throw new Exception\RuntimeException(
                    'Barcode is define outside the image (width)'
                );
            }
        } else {
            if ($this->userWidth) {
                $width = $this->barcode->getWidth(true);
                if ($this->userWidth < $width) {
                    throw new Exception\RuntimeException(
                        sprintf(
                            "Barcode is define outside the image (calculated: '%d', provided: '%d')",
                            $width,
                            $this->userWidth
                        )
                    );
                }
            }
        }
    }

    /**
     * Draw and render the barcode with correct headers
     *
     * @return mixed
     */
    public function render()
    {
        $this->draw();
        header("Content-Type: image/" . $this->imageType);
        $functionName = 'image' . $this->imageType;
        $functionName($this->resource);

        ErrorHandler::start(E_WARNING);
        imagedestroy($this->resource);
        ErrorHandler::stop();
    }

    /**
     * Draw a polygon in the image resource
     *
     * @param array $points
     * @param int $color
     * @param bool $filled
     */
    protected function drawPolygon($points, $color, $filled = true)
    {
        $newPoints = [
            $points[0][0] + $this->leftOffset,
            $points[0][1] + $this->topOffset,
            $points[1][0] + $this->leftOffset,
            $points[1][1] + $this->topOffset,
            $points[2][0] + $this->leftOffset,
            $points[2][1] + $this->topOffset,
            $points[3][0] + $this->leftOffset,
            $points[3][1] + $this->topOffset,
        ];

        $allocatedColor = imagecolorallocate(
            $this->resource,
            ($color & 0xFF0000) >> 16,
            ($color & 0x00FF00) >> 8,
            $color & 0x0000FF
        );

        $this->imageFilledPolygonWrapper($this->resource, $newPoints, 4, $allocatedColor, $filled);
    }

    /**
     * Draw a polygon in the image resource
     *
     * @param string $text
     * @param float $size
     * @param array $position
     * @param string $font
     * @param int $color
     * @param string $alignment
     * @param float|int $orientation
     * @throws Exception\RuntimeException
     */
    protected function drawText($text, $size, $position, $font, $color, $alignment = 'center', $orientation = 0)
    {
        $allocatedColor = imagecolorallocate(
            $this->resource,
            ($color & 0xFF0000) >> 16,
            ($color & 0x00FF00) >> 8,
            $color & 0x0000FF
        );

        if ($font === null) {
            $font = 3;
        }
        $position[0] += $this->leftOffset;
        $position[1] += $this->topOffset;

        if (is_numeric($font)) {
            if ($orientation) {
                /**
                 * imagestring() doesn't allow orientation, if orientation
                 * needed: a TTF font is required.
                 * Throwing an exception here, allow to use automaticRenderError
                 * to inform user of the problem instead of simply not drawing
                 * the text
                 */
                throw new Exception\RuntimeException(
                    'No orientation possible with GD internal font'
                );
            }
            $fontWidth = imagefontwidth($font);
            $positionY = $position[1] - imagefontheight($font) + 1;
            $positionX = $position[0];
            switch ($alignment) {
                case 'left':
                    $positionX = $position[0];
                    break;
                case 'center':
                    $positionX = $position[0] - ceil(($fontWidth * strlen($text)) / 2);
                    break;
                case 'right':
                    $positionX = $position[0] - ($fontWidth * strlen($text));
                    break;
            }
            imagestring($this->resource, $font, (int) $positionX, (int) $positionY, $text, $color);
        } else {
            if (! function_exists('imagettfbbox')) {
                throw new Exception\RuntimeException(
                    'A font was provided, but this instance of PHP does not have TTF (FreeType) support'
                );
            }

            $box = imagettfbbox($size, 0, $font, $text);
            switch ($alignment) {
                case 'left':
                    $width = 0;
                    break;
                case 'center':
                    $width = ($box[2] - $box[0]) / 2;
                    break;
                case 'right':
                    $width = $box[2] - $box[0];
                    break;
            }
            imagettftext(
                $this->resource,
                $size,
                $orientation,
                (int) ($position[0] - ($width * cos(pi() * $orientation / 180))),
                (int) ($position[1] + ($width * sin(pi() * $orientation / 180))),
                $allocatedColor,
                $font,
                $text
            );
        }
    }

    /**
     * @param GdImage|resource $image
     * @param array $points
     * @param int $numPoints
     * @param int $color
     * @param bool $filled
     * @return bool
     */
    protected function imageFilledPolygonWrapper($image, array $points, $numPoints, $color, $filled)
    {
        if (! $filled) {
            return imagepolygon($this->resource, $points, $numPoints, $color);
        }

        if (PHP_VERSION_ID < 80100) {
            return imagefilledpolygon($image, $points, $numPoints, $color);
        }

        return imagefilledpolygon($image, $points, $color);
    }

    /**
     * @param mixed $value
     */
    private function isGdImage($value): bool
    {
        if (PHP_MAJOR_VERSION === 8) {
            return $value instanceof GdImage;
        }

        return gettype($value) === 'resource' && get_resource_type($value) === 'gd';
    }
}
