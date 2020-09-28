@extends('layouts.login')

@section('login-views')
<div class="login-container-accommodations">

    <!-- welcome message + privileges -->
    <p class="welcome-message">Welcome <b>{{$name}},</b></p>
    <!-- message to select accommodation -->
    <p class="select-message">Please select one of the accommodations below to access its dashboard: </p>
    <div class="login-container-accommodations-list">
        @foreach($accommodations as $acc)
        <a href="{{ $acc['domain'] . '/dashboard' }}">
            {{ $acc['name'] }}
        </a>
        @endforeach

    </div>

    @foreach($roles as $role)
    @if($role->abbr === 'A')
    <p class="admin-message">You have been assigned {{ $role->name}} privileges.<br> Click the link below to perform
        actions regarding
        multiple assigned accommodations:<br>
        <a href="#">Admin Dashboard</a>
    </p>
    @endif
    @endforeach
    {{ $token }}
</div>

@endsection