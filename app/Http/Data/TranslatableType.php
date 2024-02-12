<?php

namespace App\Http\Data;

use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Saloon\Http\Response;

class TranslatableType
{
    public string $uuid = '';
    public string $code = '';
    public array $name = [];

    public function __construct(string $uuid, string $code, array $name)
    {
        $this->uuid = $uuid;
        $this->code = $code;
        $this->name = $name;
    }

    public function addTranslation(string $locale, string $translation): void
    {
        $supported_locales = LaravelLocalization::getSupportedLocales();

        if(in_array($locale, $supported_locales)) $this->name[$locale] = $translation;
    }

    public function getTranslatedName(string $locale): ?string
    {
        return !empty($this->name) && $this->name[$locale] ? $this->name[$locale] : $this->name['default'] ?? '';
    }

    public static function collectionFromResponse(Response $response): array
    {
        $data = $response->json('data', []);

        if(!empty($data)) {
            $types = [];

            foreach ($data as $entry) {
                $type = TranslatableType::createFromCollection($entry);

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
            $data['name']
        );
    }
}
