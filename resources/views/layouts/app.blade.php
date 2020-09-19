<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/app.css">
    <link href="https://fonts.googleapis.com/css2?family=Kufam:wght@900&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>Ressys</title>
</head>
<body>
    <div class="container-fluid d-flex flex-column" style="height:100vh">
        <!-- header -->
        <header class="row flex-column">
            <div class="col bg-dark" style="display:flex;justify-content:space-between;height:12.5vh">
                <h2 class="logo-text"> ® RESSYS - dashboard</h2>

                <!-- div to display profile photo -->
                <div class="profile">
                    <img src="images/photo.jpg" alt="UP">
                </div>

            </div>
            @include('includes.navbar')
        </header>

        <!-- main -->
        <main class="row flex-grow-1">
            <aside class="col-sm-12 col-md-12 col-lg-3 bg-dark">
                @include('includes.side')
            </aside>
            <section class="col-sm-12 col-md-12 col-lg-9 bg-secondary">
                @yield('content')
            </section>
        </main>

        <!-- footer -->
        <footer class="row">
            <div class="col-12 footer bg-dark">
                @include('includes.footer')
            </div>
        </footer>
    </div>
</body>
</html>