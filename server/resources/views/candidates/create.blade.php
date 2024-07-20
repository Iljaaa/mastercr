@php

/**
 * @var \App\Models\DesiredPosition $desiredPositions
 * @var \App\Models\Specialization $specializations
 */

@endphp

@extends('layouts.default')

@section('title', 'Create')

@section('content')

    <div class="mt-4 mb-4">
        <form method="post" action="{{ route('candidates.store') }}">
            @csrf
            @include('candidates.form', [
                'first_name' => old('first_name'),
                'middle_name' => old('middle_name'),
                'last_name' => old('last_name'),
                'gender' => old('gender'),
                'birth_place' => old('birth_place'),
                'citizenship' => old('citizenship'),
                'relocation_ready' => old('relocation_ready'),
                'salary' => old('salary'),
                'email' => old('email'),
                'phone' => old('phone'),
                'rating' => old('rating'),

                'ready_to_work' => old('ready_to_work'),

                'primary_connections' => old('primary_connections'),
                'builder_kr_substations' => old('builder_kr_substations'),
                'builder_kr_lines' => old('builder_kr_lines'),
                'mounting_parts' => old('mounting_parts'),
                'rza' => old('rza'),
                'asuptp' => old('asuptp'),
                'askue' => old('askue'),
                'tm' => old('tm'),
                'ss' => old('ss'),
                'ktsb' => old('ktsb'),

                'experience_110kv' => old('experience_110kv'),

                'desired_positions' => old('desired_positions', []),
                'specializations' => old('specializations', []),
                'desiredPositionsForSelect' => $desiredPositions,
                'specializationsForSelect' => $specializations
            ])
        </form>
    </div>

@endsection
