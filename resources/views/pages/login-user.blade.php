@extends('layouts.login')

@section('login-views')
<!-- login form -->
<form class="login-container-form" action="/login" method="POST">
    @csrf
    <div class="input-container">
        <i class="fa fa-user"></i>
        <input name="username" type="text" id="name" placeholder="username" required tabindex="1" autofocus>
    </div>
    <div class="input-container">
        <i class="fa fa-lock"></i>
        <input name="password" type="password" id="pass" placeholder="password" required tabindex="2">
    </div>

    <div class="form-submit">
        <input type="submit"></button>
        <a href="#">I forgot my password</a>
    </div>
    @error('invalid_login')
        <p style="color:red;"><b>Invalid Credentials, please try again</b></p>
    @enderror
</form>
@endsection