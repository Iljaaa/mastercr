@php

    /**
     *
     * @var Illuminate\Pagination\LengthAwarePaginator $candidates
     */

    $currentPage = $candidates->currentPage();
@endphp

@extends('layouts.default')

@section('title', 'Login')

@section('content')

<div style="border: solid 1px red">
    add button
    delete button
</div>

<div style="overflow: scroll; border: solid 1px red; height: 80vh">
    <form method="get" name="filterForm">
        <input type="hidden" name="page" id="page" value="{{ $currentPage }}" />
        @include('candidates.table')
    </form>
</div>

<div class="pagination mt-2">
    {{ $candidates->links('candidates.pagination', ['currentPage' => $currentPage]) }}
</div>

@endsection

