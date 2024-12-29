<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamCategory extends Model
{
    use HasFactory;

    public function teamMembers()
    {
        return $this->hasMany(Team::class, 'category', 'category')->where('status', 'Active');
    }
}