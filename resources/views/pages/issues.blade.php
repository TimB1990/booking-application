@extends('layouts.dashboard')

@section('content')
<div class="content">
    <code>
        {{ json_encode($issues) }}
    </code>
</div>
@endsection