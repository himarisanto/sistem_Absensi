<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        integrity="sha384-d7fFOB9G5c5BAUv/8LoK7I62t/TtGho8RJULj3W64FoA0a3u1qYYL/K/ONUGlUK5" crossorigin="anonymous">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('assets/css/icons/icomoon/styles.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/bootstrap_limitless.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/layout.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/components.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/colors.min.css') }}" rel="stylesheet" type="text/css">
    <script src="{{ asset('assets/js/main/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/main/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/prism.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/sticky.min.js') }}"></script>
    <script src="{{ asset('assets/js/main/app.js') }}"></script>
</head>

</body>


</head>

<body data-spy="scroll" data-target=".sidebar-component-right">
    <div class="navbar navbar-expand-md navbar-light">
        <div class="navbar-header navbar-dark d-none d-md-flex align-items-md-center">
            <div class="navbar-brand navbar-brand-md">
                <a href="index.html" class="d-inline-block"
                    style="color: white; font-size: 20px; text-decoration: none; font-family: Arial, sans-serif; font-weight: bold;">
                    Absensi
                </a>
            </div>
            <div class="navbar-brand navbar-brand-xs">
                <a href="index.html" class="d-inline-block">
                    <img src="assets/images/logo_icon_light.png" alt="" />
                </a>
            </div>
        </div>
        <div class="d-flex flex-1 d-md-none">
            <div class="navbar-brand mr-auto">
                <a href="index.html" class="d-inline-block">
                    <img src="assets/i/logo_dark.png" alt="" />
                </a>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
                <i class="icon-tree5"></i>
            </button>
            <button class="navbar-toggler sidebar-mobile-main-toggle" type="button">
                <i class="icon-paragraph-justify3"></i>
            </button>
            <button class="navbar-toggler sidebar-mobile-component-toggle" type="button">
                <i class="icon-unfold"></i>
            </button>
        </div>
        {{-- <div class="collapse navbar-collapse" id="navbar-mobile">
            <ul class="navbar-nav">
                <li class="nav-item d-flex align-items-center">
                    <a href="{{ route('card.card') }}" class="nav-link" title=""
                        style="padding-left: 10px; margin-right: 0,5em;">
                        <i class="fa fa-th" style="font-size: 1.5em;"></i>
                        <span class="d-lg-none"></span>
                    </a>
                    <a href="{{ route('users.index') }}" class="nav-link" title="" style="padding-left: 10px;">
                        <i class="fa fa-table" style="font-size: 1.5em;"></i>
                        <span class="d-lg-none ml"></span>
                    </a>
                </li>
            </ul>
        </div> --}}


        {{-- <a href="{{ route('logout') }}" class="nav-link">Logout Akun</a> --}}
        {{-- <a href="{{ route('absensi.export') }}" class="nav-link">
            <i class="fa fa-file-export"> Export</i>
        </a> --}}

        <!-- views/absensi/create.blade.php -->

        {{-- <form action="{{ route('absensi.import') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-4">
                    <input type="file" class="form-control" id="file" name="file" accept=".xlsx" required>
                </div>
            </div>
            <button type="submit" class="btn btn-success">Import</button>
        </form>
        --}}



    </div>
    <div class="page-content">
        <div class="sidebar sidebar-dark sidebar-main sidebar-expand-md">

            <div class="sidebar-content">
                <div class="card card-sidebar-mobile">
                    <ul class="nav nav-sidebar" data-nav-type="accordion">
                        <li class="nav-item-header">
                            <div class="text-uppercase font-size-xs line-height-xs">Main</div>
                            <i class="icon-menu"></i>
                        </li>
                        <li class="nav-item"><a href="{{ route('absensi.index') }}" class="nav-link">Absensi</a></li>
                        {{-- <li class="nav-item"><a href="{{ route('absensi.create') }}" class="nav-link">Add
                                Absensi</a> --}}
                        </li>

                    </ul>
                </div>
            </div>
        </div>
        @yield('content')
    </div>

</body>

</html>