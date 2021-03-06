<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset("css/app.css") }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Ressys</title>
    @livewireStyles
</head>

<body>
    <div class="flex-container">

        <!-- header -->
        <header>
            <div class="bars">
                <i style="font-size:28px;" class="fa fa-bars"></i>
            </div>
        <p class="logo-text">&reg; Ressys - {{ $accommodation->name }}</p>
            <div class="profile">
            <img src="{{ asset('images/photo.jpg')}}" alt="PP">
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

    <script>
        var menu = document.getElementById('menu-grid')

        window.onclick = function(event){
            if(event.target == menu){
                menu.classList.add("hide")
            }
        }

        function toggle(id){
            var element = document.getElementById(id);
            element.classList.toggle("hide");
        }
    </script>

    @livewireScripts

</body>

</html>