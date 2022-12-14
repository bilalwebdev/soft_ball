<?php

namespace App\Models;

use App\Helpers\Helper;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlayerGallery extends Model
{
    use HasFactory;

    const TYPE_IMG = 'TYPE_IMG';
    const TYPE_VID = 'TYPE_VID';

    protected $fillable = [
        'player_id',
        'path',
        'type',
        'sort_order',
    ];

    protected function path(): Attribute
    {
        return Attribute::make(
            get:fn($value) => self::setPaths($value, $this),
        );
    }

    protected static function setPaths($value, $row)
    {

        if ($row->type == self::TYPE_IMG) {
            return $value ? [
                'key' => $value,
                'original' => env('AWS_IMG_RESIZER') . '/' . $value,
                'large' => env('AWS_IMG_RESIZER') . '/fit-in/1080x720/' . $value,
                'medium' => env('AWS_IMG_RESIZER') . '/fit-in/720x540/' . $value,
                'small' => env('AWS_IMG_RESIZER') . '/fit-in/540x360/' . $value,
            ] : [
                'key' => $value,
                'original' => "https://via.placeholder.com/1080x1920?text=No%20Image",
                'large' => "https://via.placeholder.com/720x1080?text=No%20Image",
                'medium' => "https://via.placeholder.com/540x760?text=No%20Image",
                'small' => "https://via.placeholder.com/360x540?text=No%20Image",
            ];
        }

        if ($row->type == self::TYPE_VID) {
            return Helper::getEmbedUrls($value);
        }

        return null;
    }
}
