<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    use HasFactory;


    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'gender',
        'birth_place',
        'citizenship',
        'relocation_ready',
        'salary',
        'email',
        'phone',
        'rating',
        'primary_connections',
        'builder_kr_substations',
        'builder_kr_lines',
        'mounting_parts',
        'rza',
        'asuptp',
        'askue',
        'tm',
        'ss',
        'ktsb',
        'experience_110kv',
        'ready_to_work'
    ];

    public function desiredPositions()
    {
        return $this->belongsToMany(DesiredPosition::class, 'candidate_desired_position');
    }

    public function specializations()
    {
        return $this->belongsToMany(Specialization::class, 'candidate_specialization');
    }
}
