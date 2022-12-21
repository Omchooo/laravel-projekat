<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('temp.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">


    <title>Projekat</title>
</head>

<body>
    <div class="nav layout">
        <div class="nav-con layout">
            <div class="home layout">
                <a href="{{ url('/') }}"> Početna </a>
            </div>

            <div class="right layout">
                    @guest
                    <div class="btns layout">
                        <a href="{{ url('/login') }}"> Login </a>
                    </div>
                @else
                    <div class="btns layout">
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                            Odjava </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                    <span class="user">
                        {{ Auth::user()->name }}
                    </span>
                @endguest
                </div>
        </div>
    </div>

    {{-- content --}}
    @yield('content')


</body>

</html>
