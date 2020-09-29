@extends('layouts.login')


@section('login-views')
<p>Welcome {{ $name }}, please select one of your accommodations to access its dashboard</p>
<form class="login-container-form" action="">
    @csrf
    <div class="input-container">
        <select name="accs" id="accs">
            @foreach($accommodations as $acc)
                <option value="{{ $acc->domain }}">{{ $acc->name }}</option>
                <option value="li">List item</option>
            @endforeach
        </select>
    </div>
</form>
@endsection