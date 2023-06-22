<?php

namespace App\Http\Data;

use Saloon\Http\Response;

class DeviceType extends TranslatableType
{
    public DeviceType|null $parent_category;
    public string|null $ords_code;

    public function __construct(string $uuid, string $code, array $name, DeviceType $parent_category = null, string $ords_code = null)
    {
        parent::__construct($uuid, $code, $name);
        $this->parent_category = $parent_category;
        $this->ords_code = $ords_code;
    }

    public function isParent(): bool
    {
        return is_null($this->parent_category);
    }

    public static function collectionFromResponse(Response $response): array
    {
        $data = $response->json('data', []);

        if(!empty($data)) {
            $types = [];

            foreach ($data as $entry) {
                $type = new DeviceType(
                    $entry['id'],
                    $entry['code'],
                    $entry['name'],
                    array_key_exists('parent_category', $entry) ? new DeviceType(
                        $entry['parent_category']['id'],
                        $entry['parent_category']['code'],
                        $entry['parent_category']['name']
                    ) : null,
                    array_key_exists('ords_code', $entry) ? $entry['ords_code'] : null
                );

                $types[] = $type;
            }

            return $types;
        }

        return $data;
    }

    public static function createFromCollection(array $data): static
    {
        return new static(
            $data['id'],
            $data['code'],
            $data['name'],
            isset($data['parent_category']) ? self::createFromCollection($data['parent_category']) : null,
            $data['ords_code'] ?? null
        );
    }
}
