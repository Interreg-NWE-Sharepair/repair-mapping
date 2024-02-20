<?php

namespace App\Http\Data;

class LocationContact
{
    public string $name;
    public string $value;
    public ?string $type;

    /**
     * @param string $name
     * @param string $value
     * @param ?string $type
     */
    public function __construct(string $name, string $value, ?string $type = null)
    {
        $this->name = $name;
        $this->value = $value;
        $this->type = $type;
    }

    public static function createFromCollection(array $data): static
    {
        return new static(
            $data['name'],
            $data['value'],
            $data['type']
        );
    }
}
