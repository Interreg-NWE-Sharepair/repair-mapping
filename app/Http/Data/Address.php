<?php

namespace App\Http\Data;

class Address
{
    public string|null $street;
    public string|null $number;

    public string|null $bus;
    public string|null $postal_code;
    public string|null $city;

    public string|null $country;
    public string|null $country_code;

    public function __construct($street, $number, $bus, $postal_code, $city, $country, $country_code)
    {
        $this->street = $street;
        $this->number = $number;

        $this->bus = $bus;
        $this->postal_code = $postal_code;
        $this->city = $city;

        $this->country = $country;
        $this->country_code = $country_code;
    }

    public static function createFromCollection(array $data): static
    {
        return new static(
            $data['street'],
            $data['number'],
            $data['bus'],
            $data['postal_code'],
            $data['city'],
            $data['country'],
            $data['country_code']
        );
    }
}
