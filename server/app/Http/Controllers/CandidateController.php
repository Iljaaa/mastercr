<?php

namespace App\Http\Controllers;


use App\Http\Requests\StoreCandidateRequest;
use App\Http\Requests\UpdateCandidateRequest;
use App\Models\Candidate;
use App\Models\DesiredPosition;
use App\Models\Specialization;
use App\ViewModel\CandidatesTableFilter;
use Illuminate\Http\Request;

class CandidateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
//
//        // Получаем данные с пагинацией
//        $candidates = Candidate::with(['desiredPositions', 'specializations'])
//            ->paginate(10); // Количество элементов на странице

        $query = (new CandidatesTableFilter())->find($request);

        // Пагинация
        $perPage = 10;
        $currentPage = $request->input('page', 1);

        // Получение общей информации о пагинаторе без фактической пагинации
        $paginator = $query->paginate($perPage);

        // Если текущая страница больше максимального количества страниц, сброс на первую
        if ($currentPage > $paginator->lastPage()) {
            $currentPage = 1;
        }

        // Повторная инициализация пагинатора с корректным номером страницы
        $paginator = $query->paginate($perPage, ['*'], 'page', $currentPage);

        return view('candidates.index', [
            'desiredPositions' => DesiredPosition::all(),
            'specializations' => Specialization::all(),
            'candidates' => $paginator,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // dd (compact('desiredPositions', 'specializations'));
        return view('candidates.create', [
            'desiredPositions' => DesiredPosition::all(),
            'specializations' => Specialization::all(),
        ]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCandidateRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Candidate $candidate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Candidate $candidate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCandidateRequest $request, Candidate $candidate)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Candidate $candidate)
    {
        //
    }
}
