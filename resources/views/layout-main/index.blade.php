<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/styleEmployee.css') }}">
    <link href="{{ asset('admin_asset/assets/libs/js/toast.js') }}">
    <title>Document</title>
</head>

<body>
    <div class="header">
        <p class="title">{{ $title }}</p>
        <div class="right">
            <a href="{{route('logout')}}">
                <img src="https://github.com/mdo.png" width="32" height="32" alt="admin"
                    class="rounded-circle">
            </a>
            <p>welcome (Admin)</p>
        </div>
    </div>
    <div class="d-flex flex-column flex-shrink-0 p-3 bg-light" style="width: 280px; height: 100%">
        <a href="/listEmployee" style="padding-left: 15px;"
            class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
            <span class="fs-4">Boxyz</span>
            <i style="margin-left: 200%; font-size:150%" class="fa-solid fa-bars"></i>
        </a>
        <hr style="margin-top: 33px;">
        <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item">
                <p>CORE MODULES</p>
            </li>
            <li>
                <a href="#" class="nav-link link-dark" aria-current="page">
                    <i class="fa-solid fa-layer-group"></i>
                    Dashboard
                </a>
            </li>
            <li>
                <a href="/listEmployee" id="qlnv" class="nav-link active">
                    <i class="fa-solid fa-folder"></i>
                    Quản lí nhân viên
                </a>
            </li>
            <li>
                <a href="/listTimekeeping" id="qlcc" class="nav-link link-dark">
                    <i class="fa-solid fa-calendar-days"></i>
                    Quản lí chấm công
                </a>
            </li>
        </ul>
        <hr>
    </div>
    <div>
        @yield('content')
    </div>
    <script>
        const $ = document.querySelector.bind(document);
        if(location.href.includes('listTimekeeping')){
            $('#qlcc').classList.add('active');
            $('#qlcc').classList.remove('link-dark');
            $('#qlnv').classList.remove('active');
            $('#qlnv').classList.add('link-dark');
        }


    </script>
</body>

</html>
