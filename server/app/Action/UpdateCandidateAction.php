<?php

namespace App\Action;

use App\Http\Requests\StoreCandidateRequest;
use App\Models\Candidate;

class UpdateCandidateAction
{

    public function __invoke (Candidate $candidate, StoreCandidateRequest $request): void
    {
        $candidate->first_name = trim($request->first_name);
        $candidate->middle_name = trim($request->middle_name);
        $candidate->last_name = trim($request->last_name);
        $candidate->gender = trim($request->gender);
        $candidate->birth_place = trim($request->birth_place);
        $candidate->citizenship = trim($request->citizenship);


        $candidate->relocation_ready = (1 == $request->relocation_ready);
        $candidate->salary = (float) $request->salary;
        $candidate->email = trim($request->email);
        $candidate->phone = trim($request->phone);

        $candidate->rating = (int) $request->rating;

        $candidate->primary_connections = (1 == $request->primary_connections);
        $candidate->builder_kr_substations = (1 == $request->builder_kr_substations);
        $candidate->builder_kr_lines = (1 == $request->builder_kr_lines);
        $candidate->mounting_parts =(1 == $request->mounting_parts);
        $candidate->rza = (1 == $request->rza);
        $candidate->asuptp = (1 == $request->asuptp);
        $candidate->askue = (1 == $request->askue);
        $candidate->tm = (1 == $request->tm);
        $candidate->ss = (1 == $request->ss);
        $candidate->ktsb = (1 == $request->ktsb);

        $candidate->experience_110kv = trim($request->experience_110kv);

        $candidate->ready_to_work = (1 == $request->ktsb);

        $candidate->save();

        if ($request->has('specializations')) {
            $specializationIds = $request->input('specializations');
            $candidate->specializations()->sync($specializationIds);
        } else {
            $candidate->specializations()->sync([]);
        }

        if ($request->has('desired_positions')) {
            $desiredPositionsIds = $request->input('desired_positions');
            $candidate->desiredPositions()->sync($desiredPositionsIds);
        } else {
            $candidate->desiredPositions()->sync([]);
        }

    }

}