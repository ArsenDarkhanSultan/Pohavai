@extends('layout.main')
@section('content')
<div class="container">
    <div class="headline">
        <h1>{{$establishment->name}}</h1>
    </div>
    <div class="est_main">
        <div class="est_img_carousel">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    @for($i = 1; $i < sizeof($establishment->images); $i++)
                        <li data-target="#carouselExampleIndicators" data-slide-to="{{$i}}"></li>
                    @endfor
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{asset($establishment->images[0]->path)}}" class="d-block w-100" alt="...">
                    </div>
                    @for($i = 1; $i < sizeof($establishment->images); $i++)
                        <div class="carousel-item">
                            <img src="{{asset($establishment->images[$i]->path)}}" class="d-block w-100" alt="...">
                        </div>
                    @endfor
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>{{--TODO complete establishment page--}}
        <div class="est_definition_and_booking_form">
            <div class="est_definition">
                <div class="section section_headline">
                    <h1>{{$establishment->name}}</h1>
                    <p>{{ucwords($establishment->type->name)}}</p>
                </div>
                <div class="section section_rate_reviews">

                </div>
                <div class="section section_properties">

                </div>
                <div class="section section_features">

                </div>
                <div class="section section_contacts">

                </div>
            </div>
            <div class="booking_form">

            </div>
        </div>
    </div>
</div>
@endsection
