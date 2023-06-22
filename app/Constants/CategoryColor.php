<?php

namespace App\Constants;

class CategoryColor
{
    private const COLORS = [
        'professional_repairer' => '#3D64C8',
        'repair_cafe' => '#F57C7C',
        'urban_repair_center' => '#333333',
        'fablab' => '#2ECC71',
        'spare_parts_shop_or_library' => '#F2CA27',
        'recycling_center' => '#FF64A6'
    ];

    public static function byCode(string $code): string
    {
        return self::COLORS[$code] ?? '#000000';
    }
}
