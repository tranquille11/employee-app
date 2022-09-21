<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamMember extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'team_has_members';

    public function team()
    {
        return $this->belongsTo(Team::class);
    }
}
