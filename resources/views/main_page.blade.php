@extends('layout.main')
@section('content')
    @if(session()->has('alert'))
        <div class="alert alert-success">
            <h2>{{session()->get('alert')}}</h2>
        </div>
    @elseif($errors->any())
        <div class="alert alert-danger text-center">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
        </div>
    @endif
        <section class="banner-area relative" id="home">
            <div class="container">
                <div class="row fullscreen d-flex align-items-center justify-content-start">
                    <div class="banner-content col-lg-6 col-md-9">
                            <h4 class="welcome" style="padding: 3px">Широкие возможности выбора</h4>

                            <h1 class="text1">
                                Сегодня обслуживаем мы!
                            </h1>

                            <div class="banner-content col-lg-12" id="algrthm">
                                <a href="{{route('selections_view')}}" class="btn text-uppercase" id="show">Посмотреть подборки</a>
                                <p>
                                    <small class="text_sm">
                                        Наш алгоритм рекомендационной системы подскажет наилушие подборки заведений.
                                    </small>
                                </p>

                            </div>
                    </div>
                </div>
            </div>
        </section>

     <!-- END CANVAS CONTENT -->
{{--    <div class="main" id="main_id">--}}
{{--        <div class="inner_main">--}}
{{--                <div class="carousel_part section" style="width: 92%; margin-left: 4%; margin-top: 2%">--}}
{{--                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">--}}
{{--                        <ol class="carousel-indicators">--}}
{{--                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>--}}
{{--                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>--}}
{{--                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>--}}
{{--                        </ol>--}}
{{--                        <div class="carousel-inner">--}}
{{--                            <div class="carousel-item active">--}}
{{--                                <img class="c-block w-100" src="{{asset('test/img/myata.jpg')}}" alt="First slide">--}}
{{--                            </div>--}}
{{--                            <div class="carousel-item">--}}
{{--                                <img class="d-block w-100" src="{{asset('test/img/delmar.jpeg')}}" alt="Second slide">--}}
{{--                            </div>--}}
{{--                            <div class="carousel-item">--}}
{{--                                <img class="d-block w-100" src="{{asset('test/img/vivaldi.jpg')}}" alt="Third slide">--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">--}}
{{--                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>--}}
{{--                        <span class="sr-only">Previous</span>--}}
{{--                    </a>--}}
{{--                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">--}}
{{--                        <span class="carousel-control-next-icon" aria-hidden="true"></span>--}}
{{--                        <span class="sr-only">Next</span>--}}
{{--                    </a>--}}
{{--                </div>--}}
{{--                <div class=""></div>--}}
{{--        </div>--}}
{{--    </div>--}}
@include('layout.partials.footer')
@endsection
