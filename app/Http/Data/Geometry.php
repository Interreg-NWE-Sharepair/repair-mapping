<?php

namespace App\Http\Data;

class Geometry
{
    public string $latitude;
    public string $longitude;

    public function __construct(string $latitude, string $longitude)
    {
        $this->latitude = $latitude;
        $this->longitude = $longitude;
    }

    public static function createFromCollection(array $data): static
    {
        return new static($data['latitude'], $data['longitude']);
    }
}
