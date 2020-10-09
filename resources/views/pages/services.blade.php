@extends('layouts.dashboard')

@section('content')
<div class="content">
    <code>
        {{ json_encode($services) }}
    </code>

</div>
@endsection