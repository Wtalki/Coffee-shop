<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <!-- This file has been downloaded from Bootsnipp.com. Enjoy! -->
    <title>Admin Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('admin/styles/style.css') }}" rel="stylesheet">
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div id="wrapper">
        <nav class="navbar header-top fixed-top navbar-expand-lg  navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="#">Coffee Blend</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarText">
                    <ul class="navbar-nav side-nav">
                        {{-- <li class="nav-item">
                            <a class="nav-link" style="margin-left: 20px;" href="index.html">Home
                                <span class="sr-only">(current)</span>
                            </a>
                        </li> --}}

                        <li class="nav-item">
                            <a class="nav-link" href="{{route('category#list')}}" style="margin-left: 20px;">Category List</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('product#listPage')}}" style="margin-left: 20px;">Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('user#order')}}" style="margin-left: 20px;">Order List</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('booking#list')}}" style="margin-left: 20px;">Bookings</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('user#list')}}" style="margin-left: 20px;">User List</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('contact#list')}}" style="margin-left: 20px;">Contact List</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav ml-md-auto d-md-flex">
                        <li class="nav-item">
                            <a class="nav-link" href="index.html">Home
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link  dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{Auth::user()->name}}
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item mt-3" href="{{route('account#details')}}">Account</a>
                                <a class="dropdown-item mt-3" href="{{route('password#change')}}">Change Password</a>
                                <a class="dropdown-item mt-3" href="{{route('admin#list')}}">Admin List</a>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button class="btn btn-danger w-100 mt-3">Logout</button>
                                </form>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        @yield('content')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
@yield('scriptSource')

</html>