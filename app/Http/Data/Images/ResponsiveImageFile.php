<?php

namespace App\Http\Data\Images;

class ResponsiveImageFile extends AbstractImageFile
{
    public int $width;
    public int $height;

    /**
     * @param string $file_name
     * @param string $url
     * @param string $expires_at
     * @param int $width
     * @param int $height
     */
    public function __construct(string|null $file_name, string|null $url, string|null $expires_at, int $width, int $height)
    {
        parent::__construct($file_name, $url, $expires_at);
        $this->width = $width;
        $this->height = $height;
    }

    public static function createFromCollection(array $data): static
    {
        return new static(
            $data['file_name'],
            $data['url'],
            $data['expires_at'],
            $data['width'],
            $data['height']
        );
    }
}
