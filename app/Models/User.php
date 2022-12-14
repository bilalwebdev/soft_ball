<?php

namespace App\Models;

use App\Helpers\Helper;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles, HasSlug;
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];
    protected $table = 'users';
    protected $fillable = [
        'title',
        'name',
        'home_town',
        'email',
        'image',
        'phone',
        'youtube',
        'instagram',
        'twitter',
        'facebook',
        'youtube',
        'password',
        'type',
        'description',
        'high_school',
        'guest_playing',
        'team_id',
        'school_name',
        'class_of',
        'gpa',
        'weighted_gpa',
        'sat',
        'act',
        'jersey_no',
        'height',
        'bats',
        'throws',
        'primary_position',
        'exit_velo',
        'overhand_velo',
        'inf_pop_time',
        'catcher_pop_time',
        'home_to_1st',
        'pitching_velo',
        'school_site_link',
        'video',

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

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


    /**
     * Get the team that owns the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function team(): BelongsTo
    {
        return $this->belongsTo(Team::class, 'team_id');
    }

    /**
     * Get all of the pictures for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pictures(): HasMany
    {
        return $this->hasMany(PlayerGallery::class, 'player_id')->where('type', PlayerGallery::TYPE_IMG);
    }

    /**
     * Get all of the videos for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function videos(): HasMany
    {
        return $this->hasMany(PlayerGallery::class, 'player_id')->where('type', PlayerGallery::TYPE_VID);
    }
    protected function video(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => Helper::getEmbedUrls($value)
        );
    }
}
