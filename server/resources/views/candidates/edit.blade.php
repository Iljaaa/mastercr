@php

/**
 * @var \App\Models\Candidate $candidate
 * @var \App\Models\DesiredPosition $desiredPositions
 * @var \App\Models\Specialization $specializations
 */

$selectedDesiredPositions = $candidate->desiredPositions->map( fn (\App\Models\DesiredPosition $dp) => $dp->id)->toArray();
$selectedSpecializations = $candidate->specializations->map( fn (\App\Models\Specialization $s) => $s->id)->toArray();

@endphp

@extends('layouts.default')

@section('title', 'Edit')

@section('content')

    <div class="mt-4 mb-4">

        <form method="post" action="{{ route('candidates.update', $candidate->id) }}">
            @method('PUT')
            @csrf
            @include('candidates.form', [
                'first_name' => old('first_name', $candidate->first_name),
                'middle_name' => old('middle_name', $candidate->middle_name),
                'last_name' => old('last_name', $candidate->last_name),
                'gender' => old('gender', $candidate->gender),
                'birth_place' => old('birth_place', $candidate->birth_place),
                'citizenship' => old('citizenship', $candidate->citizenship),
                'relocation_ready' => old('relocation_ready', $candidate->relocation_ready),
                'salary' => old('salary', $candidate->salary),
                'email' => old('email', $candidate->email),
                'phone' => old('phone', $candidate->phone),
                'rating' => old('rating', $candidate->rating),

                'ready_to_work' => old('ready_to_work', $candidate->ready_to_work),

                'primary_connections' => old('primary_connections', $candidate->primary_connections),
                'builder_kr_substations' => old('builder_kr_substations', $candidate->builder_kr_substations),
                'builder_kr_lines' => old('builder_kr_lines', $candidate->builder_kr_lines),
                'mounting_parts' => old('mounting_parts', $candidate->mounting_parts),
                'rza' => old('rza', $candidate->rza),
                'asuptp' => old('asuptp', $candidate->asuptp),
                'askue' => old('askue', $candidate->askue),
                'tm' => old('tm', $candidate->tm),
                'ss' => old('ss', $candidate->ss),
                'ktsb' => old('ktsb', $candidate->ktsb),

                'experience_110kv' => old('experience_110kv', $candidate->experience_110kv),

                'desired_positions' => old('desired_positions', $selectedDesiredPositions),
                'specializations' => old('specializations', $selectedSpecializations),
                'desiredPositionsForSelect' => $desiredPositions,
                'specializationsForSelect' => $specializations
            ])
        </form>

    </div>

@endsection
