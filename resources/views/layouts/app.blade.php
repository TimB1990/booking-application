<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/app.css">
    <link href="https://fonts.googleapis.com/css2?family=Kufam:wght@900&display=swap" rel="stylesheet">
    <title>Ressys</title>
</head>
<body>
    <div class="container">
        <header>
            <div class="logo-text">Ressys - dashboard</div>
            <div class="profile">
                <img src="images/photo.jpg" alt="PP">
            </div>
        </header>
        <main>
            @include('includes.menu')
        </main>
        <footer class="footer">
            @include('includes.footer')
        </footer>
    </div>
</body>
</html>