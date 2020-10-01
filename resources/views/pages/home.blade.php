@extends('layouts.dashboard')

@section('content')
<div class="content">
    @include('components.home.info-table')
    <div class="charts-panel">
        @include('components.svg.charts.reservations')
        @include('components.svg.charts.reservations')
        @include('components.svg.charts.reservations')
    </div>
</div>
@endsection