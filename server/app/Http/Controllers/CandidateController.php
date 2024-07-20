<?php

namespace App\Http\Controllers;


use App\Action\UpdateCandidateAction;
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

        $query = (new CandidatesTableFilter())->find($request);

        $perPage = 10;
        $currentPage = $request->input('page', 1);

        $paginator = $query->paginate($perPage);

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
        $candidate = new Candidate();
        (new UpdateCandidateAction())($candidate, $request);
        return redirect()
            ->route('candidates.index')
            ->with('success', sprintf('Candidate %s created!', $candidate->id));
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
        // dd (compact('desiredPositions', 'specializations'));
        return view('candidates.edit', [
            'candidate' =>  $candidate,
            'desiredPositions' => DesiredPosition::all(),
            'specializations' => Specialization::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCandidateRequest $request, Candidate $candidate)
    {
        //
        (new UpdateCandidateAction())($candidate, $request);
        return redirect()
            ->route('candidates.index')
            ->with('success', sprintf('Candidate %s updated!', $candidate->id));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Candidate $candidate)
    {
        $candidate->delete();
        return redirect()->route('candidates.index');
    }
}
