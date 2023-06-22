<?php

namespace App\Http\Data\Images;

class MainImageFile extends AbstractImageFile
{
    /**
     * @var ResponsiveImageFile[]
     */
    public array $responsive_sizes;

    /**
     * @param ResponsiveImageFile[] $responsive_sizes
     */
    public function __construct(string|null $file_name, string|null $url, string|null $expires_at, array $responsive_sizes)
    {
        parent::__construct($file_name, $url, $expires_at);
        $this->responsive_sizes = $responsive_sizes;
    }

    public static function createFromCollection(array $data): static
    {
        $responsive_sizes = [];
        if(isset($data['responsive_sizes'])) {
            foreach ($data['responsive_sizes'] as $size) {
                $responsive_sizes[] = ResponsiveImageFile::createFromCollection($size);
            }
        }

        return new static(
            $data['file_name'],
            $data['url'],
            $data['expires_at'],
            $responsive_sizes
        );
    }
}
