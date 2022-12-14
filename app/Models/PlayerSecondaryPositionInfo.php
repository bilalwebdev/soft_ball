<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlayerSecondaryPositionInfo extends Model
{
    use HasFactory;
    protected $table = 'player_secondary_position_infos';
    protected $fillable = [
        'player_id',
        'name',
        'sort_order',
    ];
}
