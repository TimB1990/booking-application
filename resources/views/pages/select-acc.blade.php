@extends('layouts.login')


@section('login-views')
<p>Welcome {{ $name }}, please select one of your accommodations to access its dashboard</p>
<form class="login-container-form" action="/login/redirect" method="POST">
    @csrf
    <div class="input-container">
        <select name="domain" id="acc" required tabindex="1">
            @foreach($accommodations as $acc)
                <option value="{{ $acc->domain }}">{{ $acc->name }}</option>
            @endforeach

            <option value="test">test</option>
        </select>
    </div>
    <div class="form-submit">
        <input type="submit" value="To Dashboard"/>
        <span><b>Assigned Roles:</b>
            @foreach($roles as $role)
                {{ $role->name }},
            @endforeach
        </span>
    </div>
</form>
@endsection