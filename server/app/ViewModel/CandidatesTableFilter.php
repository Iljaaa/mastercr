<?php

namespace App\ViewModel;


use App\Models\Candidate;
use Illuminate\Http\Request;

class CandidatesTableFilter extends Candidate
{
    public function find(Request $request)
    {
        $query = Candidate::with(['desiredPositions', 'specializations']);

        // Фильтрация по имени
        if ($request->filled('fio')) {
            $fio = $request->get('fio');
            $query->where(function ($q) use ($fio) {
                $q->where('first_name', 'like', '%' . $fio . '%')
                    ->orWhere('last_name', 'like', '%' . $fio . '%')
                    ->orWhere('middle_name', 'like', '%' . $fio . '%');
            });
        }

        if ($request->filled('gender')) $query->where('gender',  $request->get('gender'));
        if ($request->filled('birth_place')) $query->where('birth_place', 'like', '%' . $request->get('birth_place') . '%');
        if ($request->filled('citizenship')) $query->where('citizenship', 'like', '%' . $request->get('citizenship') . '%');

        if ($request->filled('relocation_ready')) {
            $query->where('relocation_ready', $request->get('relocation_ready'));
        }

        //
        if ($request->filled('desired_positions')) {
            $desiredPositions = $request->get('desired_positions');
            $query->whereHas('desiredPositions', function ($query) use ($desiredPositions) {
                $query->whereIn('desired_position_id', $desiredPositions);
            });
        }

        if ($request->filled('salary_min')) $query->where('salary', '>=', $request->get('salary_min'));
        if ($request->filled('salary_max')) $query->where('salary', '<=', $request->get('salary_max'));

        //
        if ($request->filled('specializations')) {
            $specializations = $request->get('specializations');
            $query->whereHas('specializations', function ($query) use ($specializations) {
                $query->whereIn('specialization_id', $specializations);
            });
        }

        if ($request->filled('email')) $query->where('email', 'like', '%' . $request->get('email') . '%');
        if ($request->filled('phone')) $query->where('phone', 'like', '%' . $request->get('phone') . '%');

        if ($request->filled('rating_min')) $query->where('rating', '>=', $request->get('rating_min'));
        if ($request->filled('rating_max')) $query->where('rating', '<=', $request->get('rating_max'));

        if ($request->filled('primary_connections')) $query->where('primary_connections', 1);
        if ($request->filled('builder_kr_substations')) $query->where('builder_kr_substations', 1);
        if ($request->filled('builder_kr_lines')) $query->where('builder_kr_lines', 1);
        if ($request->filled('mounting_parts')) $query->where('mounting_parts', 1);
        if ($request->filled('rza')) $query->where('rza', 1);
        if ($request->filled('asuptp')) $query->where('asuptp', 1);
        if ($request->filled('askue')) $query->where('askue', 1);
        if ($request->filled('tm')) $query->where('tm', 1);
        if ($request->filled('ss')) $query->where('ss', 1);
        if ($request->filled('ktsb')) $query->where('ktsb', 1);

        if ($request->filled('experience_110kv')) $query->where('experience_110kv', 'like', '%' . $request->get('experience_110kv') . '%');

        if ($request->filled('ready_to_work')) $query->where('ready_to_work', 1);

        return $query;
    }


}