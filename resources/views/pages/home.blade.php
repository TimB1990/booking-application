@extends('layouts.dashboard')

@section('content')
<div class="content">
    @include('components.home.info-table')
    <div class="charts-panel">
        @include('components.svg.charts.residences-in-use')
        @include('components.svg.charts.meeting-rooms-in-use')
    </div>
</div>
@endsection