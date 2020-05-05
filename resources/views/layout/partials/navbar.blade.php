@php
$types = App\Models\Type::all();
@endphp
<nav class="navbar navbar-dark bg-dark">
    <a class="navbar-brand" href="{{url('/')}}"><p id="logo">Pohavai</p></a>
    <nav class="menu">
        <ul class="navbar-nav mr-auto">
            <li id="kk"><a href="{{url('/')}}">ДОМОЙ</a></li>
            @if (isset($types))
                @foreach($types as $type_name)
                    <li id="kk"><a href="{{url('establishments_list', $type_name->name)}}">{{mb_strtoupper($type_name->title)}}</a></li>
                @endforeach
            @endif
            <li id="kk"><a href="{{route('profile_show')}}">ПРОФИЛЬ</a></li>
            <li id="kk"><a href="#contact">КОНТАКТЫ</a></li>
            @if (Auth::check())
                <li id="kk"><a href="{{route('logout')}}">ВЫХОД</a></li>
            @else
                <li id="kk"><a href="{{route('loginForm')}}">ВХОД</a></li>
                <li id="kk"><a href="{{route('registerForm')}}">РЕГИСТРАЦИЯ</a></li>
            @endif
        </ul>
    </nav>
</nav>














{{--<div class="navbar_part" style="margin-top: 0">--}}
{{--    <nav class="navbar navbar-expand-lg navbar-light" style="width: 100%">--}}
{{--        <a class="navbar-brand" style="margin-left: 2%; font-size: 35px;--}}
{{--                font-weight: 500; position: absolute;" href="#">--}}
{{--            <img src="{{asset('test/img/logo1.jpg')}}" alt="logo">--}}
{{--        </a>--}}
{{--        <div class="collapse navbar-collapse" id="navbarTogglerDemo02" style="margin-left: 28%">--}}
{{--            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">--}}
{{--                <li class="nav-item first_item">--}}
{{--                    <div class="dropdown" onmouseover="dropdown_hover()" onmouseleave="dropdown_hover_out()">--}}
{{--                        <button onclick="window.location.href = '##';" class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--                            Бары--}}
{{--                        </button>--}}
{{--                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">--}}
{{--                            <a class="dropdown-item" href="#">Action</a>--}}
{{--                            <a class="dropdown-item" href="#">Another action</a>--}}
{{--                            <a class="dropdown-item" href="#">Something else here</a>--}}
{{--                            <a class="dropdown-item" href="#">Action</a>--}}
{{--                            <a class="dropdown-item" href="#">Another action</a>--}}
{{--                            <a class="dropdown-item" href="#">Something else here</a>--}}
{{--                            <a class="dropdown-item" href="#">Action</a>--}}
{{--                            <a class="dropdown-item" href="#">Another action</a>--}}
{{--                            <a class="dropdown-item" href="#">Something else here</a>--}}
{{--                            <a class="dropdown-item" href="#">Action</a>--}}
{{--                            <a class="dropdown-item" href="#">Another action</a>--}}
{{--                            <a class="dropdown-item" href="#">Something else here</a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </li>--}}
{{--                <li class="nav-item">--}}
{{--                    <div class="dropdown">--}}
{{--                        <button onclick="window.location.href = '##';" class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--                            Рестораны--}}
{{--                        </button>--}}
{{--                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">--}}
{{--                            <a class="dropdown-item" href="#">Action</a>--}}
{{--                            <a class="dropdown-item" href="#">Another action</a>--}}
{{--                            <a class="dropdown-item" href="#">Something else here</a>--}}
{{--                            <a class="dropdown-item" href="#">Action</a>--}}
{{--                            <a class="dropdown-item" href="#">Another action</a>--}}
{{--                            <a class="dropdown-item" href="#">Something else here</a>--}}
{{--                            <a class="dropdown-item" href="#">Action</a>--}}
{{--                            <a class="dropdown-item" href="#">Another action</a>--}}
{{--                            <a class="dropdown-item" href="#">Something else here</a>--}}
{{--                            <a class="dropdown-item" href="#">Action</a>--}}
{{--                            <a class="dropdown-item" href="#">Another action</a>--}}
{{--                            <a class="dropdown-item" href="#">Something else here</a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </li>--}}
{{--                <li class="nav-item">--}}
{{--                    <div class="dropdown">--}}
{{--                        <button onclick="window.location.href = '##';" class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--                            Кафе--}}
{{--                        </button>--}}
{{--                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">--}}
{{--                            <a class="dropdown-item" href="#">Action</a>--}}
{{--                            <a class="dropdown-item" href="#">Another action</a>--}}
{{--                            <a class="dropdown-item" href="#">Something else here</a>--}}
{{--                            <a class="dropdown-item" href="#">Action</a>--}}
{{--                            <a class="dropdown-item" href="#">Another action</a>--}}
{{--                            <a class="dropdown-item" href="#">Something else here</a>--}}
{{--                            <a class="dropdown-item" href="#">Action</a>--}}
{{--                            <a class="dropdown-item" href="#">Another action</a>--}}
{{--                            <a class="dropdown-item" href="#">Something else here</a>--}}
{{--                            <a class="dropdown-item" href="#">Action</a>--}}
{{--                            <a class="dropdown-item" href="#">Another action</a>--}}
{{--                            <a class="dropdown-item" href="#">Something else here</a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </li>--}}
{{--                <li class="nav-item">--}}
{{--                    <div class="dropdown">--}}
{{--                        <button onclick="window.location.href = '##';" class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--                            Алматы--}}
{{--                        </button>--}}
{{--                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">--}}
{{--                            <a class="dropdown-item" href="#">Action</a>--}}
{{--                            <a class="dropdown-item" href="#">Another action</a>--}}
{{--                            <a class="dropdown-item" href="#">Something else here</a>--}}
{{--                            <a class="dropdown-item" href="#">Action</a>--}}
{{--                            <a class="dropdown-item" href="#">Another action</a>--}}
{{--                            <a class="dropdown-item" href="#">Something else here</a>--}}
{{--                            <a class="dropdown-item" href="#">Action</a>--}}
{{--                            <a class="dropdown-item" href="#">Another action</a>--}}
{{--                            <a class="dropdown-item" href="#">Something else here</a>--}}
{{--                            <a class="dropdown-item" href="#">Action</a>--}}
{{--                            <a class="dropdown-item" href="#">Another action</a>--}}
{{--                            <a class="dropdown-item" href="#">Something else here</a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </li>--}}
{{--            </ul>--}}
{{--            <form class="form-inline my-2 my-lg-0" style="margin-right: 2%">--}}
{{--                <input class="form-control mr-sm-2" type="search" placeholder="Search">--}}
{{--                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>--}}
{{--            </form>--}}
{{--            <div style="width: 3%; margin-right: 2.5%">--}}
{{--                <a href="#"><img src="{{asset('test/img/user.png')}}" alt="..."--}}
{{--                    style="width: 100%"></a>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </nav>--}}
{{--</div>--}}
