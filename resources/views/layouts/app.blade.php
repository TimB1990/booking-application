<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/app.css">
    <link href="https://fonts.googleapis.com/css2?family=Kufam:wght@900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Ressys</title>
</head>
<body>
    <div class="flex-container">

        <!-- header -->
        <header>
            <div class="bars">
                <i style="font-size:28px;" class="fa fa-bars"></i>
            </div>    
            <p class="logo-text">&reg; Ressys - dashboard</p>
            <div class="profile">
                <img src="images/photo.jpg" alt="PP">
            </div>         
        </header>

        <nav>
            @include('includes.navbar')  
        </nav>

        <!-- main -->
        <main>
            @include('includes.menu')
            @yield('content')
        </main>

        <!-- footer -->
        <footer class="footer">
            @include('includes.footer')
        </footer>
    </div>

</body>
</html>