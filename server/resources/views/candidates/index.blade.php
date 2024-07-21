@php

    /**
     *
     * @var Illuminate\Pagination\LengthAwarePaginator $candidates
     */

    $currentPage = $candidates->currentPage();
@endphp

@extends('layouts.default')

@section('title', 'List')

@section('content')

<script>
function confirmDelete(event, url) {
    event.stopPropagation()
    if (!confirm("Удалить эту запись?")) return;

    fetch(url, {
        method: 'DELETE',
        headers: {
            'Content-Type': 'application/json',
            'X-Requested-With': 'XMLHttpRequest',
            // Включите токен CSRF, если требуется
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
    })
    .then(response => {
        if (!response.ok) {
            alert('Произошла ошибка при удалении записи.');
        }

        window.location.reload();
    })
    .catch(error => {
        console.error('Ошибка:', error);
        alert('Произошла ошибка при удалении записи222.');
    });

}
</script>

<meta name="csrf-token" content="{{ csrf_token() }}">

<div style="display: flex; flex-direction: column; height: calc(100vh - 70px)">
    <div class="container mt-2">
        <a href="{{ route('candidates.create') }}" class="btn btn-primary">Create new candidate</a>

        @if (session('success'))
            <div class="alert alert-success mt-2">
                {{ session('success') }}
            </div>
        @endif
    </div>

    <div style="flex: 1; overflow: auto; padding: 10px">
        <form method="get" name="filterForm">
            <input type="hidden" name="page" id="page" value="{{ $currentPage }}" />
            @include('candidates.table')
        </form>
    </div>

    <div class="container">
        <div class="pagination mt-2">
            {{ $candidates->links('candidates.pagination', ['currentPage' => $currentPage]) }}
        </div>
    </div>

</div>


@endsection

