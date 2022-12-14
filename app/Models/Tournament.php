<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Tournament extends Model
{
    use HasFactory, HasSlug;

    protected $table = "tournaments";
    protected $fillable = ['title', 'slug', 'begining_date', 'ending_date', 'location'];

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    /**
     * The teams that belong to the Tournament
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function teams(): BelongsToMany
    {
        return $this->belongsToMany(Team::class, 'tournament_teams', 'tournament_id', 'team_id');
    }


    /**
     * Get all of the games for the Tournament
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function games(): HasMany
    {
        return $this->hasMany(Game::class,'tournament_id')->oldest('date');
    }


    /**
     * Get all of the pictures for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pictures(): HasMany
    {
        return $this->hasMany(TournamentGallery::class, 'tournament_id')->where('type', TournamentGallery::TYPE_IMG);
    }

    /**
     * Get all of the videos for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function videos(): HasMany
    {
        return $this->hasMany(TournamentGallery::class, 'tournament_id')->where('type', TournamentGallery::TYPE_VID);
    }
}
