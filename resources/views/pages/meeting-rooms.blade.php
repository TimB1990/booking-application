@extends('layouts.dashboard')

@section('content')
<div class="content">
    <code>
        {{ count($meetingRooms) > 0 ? $meetingRooms : 'no meeting rooms found' }}

    </code>
</div>

    
@endsection