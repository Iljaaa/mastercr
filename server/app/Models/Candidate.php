<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $first_name
 * @property string $middle_name
 * @property string $last_name
 * @property string $gender
 * @property string $birth_place
 * @property string $citizenship
 * @property int $relocation_ready
 * @property int $salary
 * @property string $email
 * @property string $phone
 * @property int $rating
 * @property int $primary_connections
 * @property int $builder_kr_substations
 * @property int $builder_kr_lines
 * @property int $mounting_parts
 * @property int $rza
 * @property int $asuptp
 * @property int $askue
 * @property int $tm
 * @property int $ss
 * @property int $ktsb
 * @property string $experience_110kv
 * @property int $ready_to_work
 *
 * @property DesiredPosition[] desiredPositions
 * @property Specialization[] specializations
 */
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
