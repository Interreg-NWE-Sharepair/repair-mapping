<?php

namespace App\Http\Data;

use App\Http\Data\Images\MainImageFile;
use App\Http\Data\Images\ResponsiveImageFile;
use Saloon\Http\Response;

class Location
{
    public string|null $id;
    public array $name;
    public array $slug;

    public array $description;
    /**
     * @var string[]
     */
    public array $product_description;

    public Address $address;
    public string|null $address_formatted;
    public Geometry $geometry;

    public bool $has_warranty;
    public array|null $warranty_description;

    public TranslatableType|null $organisation_type;
    /**
     * @var DeviceType[]
     */
    public array $device_types;
    /**
     * @var TranslatableType[]
     */
    public array $activity_sectors;

    public array $contacts;
    /**
     * @var string[]
     */
    public array $locales;

    public MainImageFile|null $logo;
    /**
     * @var MainImageFile[]
     */
    public array $images;

    public bool $active_on_repair_connects;
    public int $active_repairers_count;
    public int $repaired_devices_count;

    /**
     * @param string|null $id
     * @param array $name
     * @param array $slug
     * @param array $description
     * @param string[] $product_description
     * @param Address $address
     * @param string|null $address_formatted
     * @param Geometry $geometry
     * @param bool $has_warranty
     * @param array $warranty_description
     * @param TranslatableType|null $organisation_type
     * @param array $device_types
     * @param array $activity_sectors
     * @param array $contacts
     * @param string[] $locales
     * @param MainImageFile|null $logo
     * @param array $images
     * @param bool $active_on_repair_connects
     * @param int $active_repairers_count
     * @param int $repaired_devices_count
     */
    public function __construct(string|null $id, array $name, array $slug, array $description, array $product_description,
                                Address $address, string|null $address_formatted, Geometry $geometry, bool $has_warranty,
                                array $warranty_description, TranslatableType|null $organisation_type, array $device_types,
                                array $activity_sectors, array $contacts, array $locales, MainImageFile|null $logo, array $images,
                                bool $active_on_repair_connects, int $active_repairers_count, int $repaired_devices_count)
    {
        $this->id = $id;
        $this->name = $name;
        $this->slug = $slug;
        $this->description = $description;
        $this->product_description = $product_description;
        $this->address = $address;
        $this->address_formatted = $address_formatted;
        $this->geometry = $geometry;
        $this->has_warranty = $has_warranty;
        $this->warranty_description = $warranty_description;
        $this->organisation_type = $organisation_type;
        $this->device_types = $device_types;
        $this->activity_sectors = $activity_sectors;
        $this->contacts = $contacts;
        $this->locales = $locales;
        $this->logo = $logo;
        $this->images = $images;
        $this->active_on_repair_connects = $active_on_repair_connects;
        $this->active_repairers_count = $active_repairers_count;
        $this->repaired_devices_count = $repaired_devices_count;
    }

    public static function createFromResponse(Response $response): static
    {
        $data = $response->json('data', default: []);

        $device_types = [];
        if(isset($data['device_types'])) {
            foreach($data['device_types'] as $type) {
                $device_types[] = DeviceType::createFromCollection($type);
            }
        }

        $contacts = [];
        if(isset($data['contacts'])) {
            foreach($data['contacts'] as $type => $ofType) {
                $values = [];
                foreach ($ofType as $contact) {
                    $values[] = LocationContact::createFromCollection($contact);
                }
                $contacts[$type] = $values;
            }
        }

        $images = [];
        if(isset($data['images'])) {
            foreach ($data['images'] as $image) {
                $images[] = MainImageFile::createFromCollection($image);
            }
        }

        return new static(
            $data['id'] ?? null,
            $data['name'] ?? [],
            $data['slug'] ?? [],
            $data['description'] ?? [],
            $data['product_description'] ?? [],
            $data['address'] ? Address::createFromCollection($data['address']) : [],
            $data['address_formatted'] ?? null,
            $data['geometry'] ? Geometry::createFromCollection($data['geometry']) : null,
            $data['has_warranty'] ?? false,
            $data['warranty_description'] ?? [],
            $data['organisation_type'] ? TranslatableType::createFromCollection($data['organisation_type']) : null,
            $device_types,
            $data['activity_sectors'] ?? [],
            $contacts,
            $data['locales'] ?? [],
            $data['logo'] ? MainImageFile::createFromCollection($data['logo']) : null,
            $images,
            $data['active_on_repair_connects'] ?? false,
            $data['active_repairers_count'] ?? 0,
            $data['repaired_devices_count'] ?? 0
        );
    }

    public function getTranslatedName(string $locale): string
    {
        $name = '';

        if(!empty($this->name)) {
            $name = $this->name[$locale] ?? $this->name['default'];
        }

        return $name;
    }

    public function getTranslatedOrganisationType(string $locale): string
    {
        $name = '';

        if(!empty($this->organisation_type)) {
            $name = $this->organisation_type->getTranslatedName($locale);
        }

        return $name;
    }

    public function getTranslatedDescription(string $locale): string|null
    {
        $description = '';

        if(!empty($this->description)) {
            $description = $this->description[$locale] ?? $this->description['default'];
        }

        return $description;
    }

    public function getTranslatedWarrantyDescription(string $locale): string|null
    {
        $description = '';

        if(!empty($this->warranty_description)) {
            $description = $this->warranty_description[$locale] ?? $this->warranty_description['default'];
        }

        return $description;
    }

    public function getTranslatedSlug(string $locale): string
    {
        $slug = '';

        if(!empty($this->slug)) {
            $slug = $this->slug[$locale] ?? $this->slug['default'];
        }

        return $slug;
    }
}
