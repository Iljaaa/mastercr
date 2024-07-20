<?php

namespace Database\Seeders;

use App\Models\Candidate;
use App\Models\DesiredPosition;
use App\Models\Specialization;
use Illuminate\Database\Seeder;

class CandidateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Получите записи желаемых должностей и специализаций
        $desiredPositions = DesiredPosition::all();
        $specializations = Specialization::all();

        // Создание 10 кандидатов и привязка желаемых должностей и специализаций
        Candidate::factory()->count(100)->create()->each(function ($candidate) use ($desiredPositions, $specializations) {
            // Привязка 2 случайных желаемых должностей к каждому кандидату
            $candidate->desiredPositions()->attach($desiredPositions->random(2));

            // Привязка 3 случайных специализаций к каждому кандидату
            $candidate->specializations()->attach($specializations->random(3));
        });
    }
}
