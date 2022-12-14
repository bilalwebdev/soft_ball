<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Team extends Model
{
    use HasFactory, HasSlug;

    protected $table = "teams";
    protected $fillable = [
        'title', 'slug', 'image', 'description', 'user_id',     'youtube',
        'instagram',
        'twitter',
        'facebook',
    ];

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    protected function image(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value ? [
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
            ],
        );
    }

    public function managers()
    {
        return $this->belongsToMany(User::class);
    }

    /**
     * Get all of the players for the Team
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function players(): HasMany
    {
        return $this->hasMany(User::class);
    }
}
