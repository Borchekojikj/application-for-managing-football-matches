<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'founded_year',
    ];


    public function matches()
    {
        return $this->hasMany(GameMatch::class, 'team_1_id')->orWhere('team_2_id', $this->id);
    }

    public function players()
    {
        return $this->hasMany(Player::class);
    }
}
