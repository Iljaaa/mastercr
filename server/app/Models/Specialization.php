<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $specialization
 */
class Specialization extends Model
{
    use HasFactory;

    protected $fillable = ['specialization'];

    public function candidates()
    {
        return $this->belongsToMany(Candidate::class, 'candidate_specialization');
    }
}
