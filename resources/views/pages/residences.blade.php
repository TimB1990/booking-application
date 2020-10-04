@extends('layouts.dashboard')

@section('content')

<div class="content">
    @foreach($residences as $res)
    <div class="res-record {{ $res->taken == true ? ' taken' : ' free'}}">
        <p>nr: {{ $res->residence_nr}}</p>
        <p>area m2: {{ $res->area_m2}}</p>
        <p>type: {{ $res->type }}</p>
        <p>price per night: {{ $res->price_per_night }}</p>
    </div>
    @endforeach
</div>

@endsection