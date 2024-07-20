<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DesiredPositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $positions = [
            'Энергетик',
            'Электрик',
            'Проектировщик',
            'Инженер РЗА',
            'Главный специалист отдела электроснабжения',
            'Инженер-проектировщик (удалённо по ТК)',
            'Инженер-проектировщик'
        ];

        foreach ($positions as $position) {
            DB::table('desired_positions')->insert([
                'position' => $position,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
