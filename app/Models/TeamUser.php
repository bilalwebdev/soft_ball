<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamUser extends Model
{
    protected $fillable = ['team_id', 'user_id'];
    protected $table = 'team_user';
    use HasFactory;


    public function team(){

        return $this->belongsTo(Team::class);

    }
}

