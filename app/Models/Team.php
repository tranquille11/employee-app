<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];

    public function schedules()
    {
        return $this->hasMany(TeamSchedule::class);
    }

    public function members()
    {
        return $this->hasMany(TeamMember::class);
    }
}
