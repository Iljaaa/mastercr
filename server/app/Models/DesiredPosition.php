<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DesiredPosition extends Model
{
    use HasFactory;

    protected $fillable = ['position'];

    public function candidates()
    {
        return $this->belongsToMany(Candidate::class, 'candidate_desired_position');
    }
}
