<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GameMatch extends Model
{
    use HasFactory;
    protected $table = 'matches';

    protected $fillable = [
        'team_1_id',
        'team_2_id',
        'date_match',
    ];

    public function team1()
    {
        return $this->belongsTo('App\Models\Team', 'team_1_id');
    }

    public function team2()
    {
        return $this->belongsTo('App\Models\Team', 'team_2_id');
    }
}
