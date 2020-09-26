<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/app.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Login</title>
</head>
<body style="border:none;">
    <div class="login">
        <div class="login-container">
            <!-- header -->
            <div class="login-container-header">
                <p>&reg; Ressys - login</p>
                <p>Employee</p>
            </div>

            <!-- error -->
            @if($errors->any())
                <div class="error">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

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

            </form>
        </div>
    </div>
</body>
</html>