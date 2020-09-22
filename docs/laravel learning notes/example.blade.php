<!-- return view -->
<?php 
// return view with data
Route::get('greeting',function(){
    return view('welcome',['name' => 'Tim']);
});
?>

<h1>Hello, {{name}}</h1>

<!-- AUTH CHECK -->
@unless(Auth::check())
    <p>you are not signed in!</p>
@endunless

<!-- CHECK NULL -->
@isset($records)
    <p>{{$records}} is defined and is not null</p>
@endisset

<!-- specified authenticatino guard -->
@auth('admin')
    <span>you are authenticated by admin</span>
@endauth

@guest('admin')
<span>you are not authenticated by admin</span>
@endguest

<!-- error directive -->
<label for="email">Your email address</label>

<!-- class is inavlid on error -->
<input type="email" id="email" class="@error('email','login') is-invalid @enderror"/>

@error('eamil','login')
<div class="alert alert-danger">
    {{ $message }}
</div>