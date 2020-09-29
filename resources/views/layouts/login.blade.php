<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset("css/app.css") }}">
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
            <!-- yield login views -->
            @yield('login-views')
        </div>
    </div>
</body>

</html>