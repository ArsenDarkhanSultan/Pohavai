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
                    <p>{{$establishment->description}}</p>
                </div>
                <hr>
                <div class="section section_rate_reviews">
                    <div class="section_rate">
                        <div class="star star_1"></div>
                        <div class="star star_2"></div>
                        <div class="star star_3"></div>
                        <div class="star star_4"></div>
                        <div class="star star_5"></div>
                        <div class="star_rate"><p>{{$establishment->rating}}</p></div>
                    </div>
                    <div class="section_reviews">
                        <div><a href="#">{{sizeof($establishment->reviews)}} Reviews</a></div>
                    </div>
                </div>
                <hr>
                <div class="section section_properties">
                    <div class="property_cuisine">
                        <div class="icon">
                            <img src="{{asset('test/img/main_images/cuisine.png')}}" alt="">
                        </div>
                        <div class="defs">
                            <div class="name">
                                <b>Cuisine</b>
                            </div>
                            <div class="val">
                                <p>{{implode(', ', $establishment->cuisines->pluck('name')->toArray())}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="property_ave_check">
                        <div class="icon">
                            <img src="{{asset('test/img/main_images/ave_check.png')}}" alt="">
                        </div>
                        <div class="defs">
                            <div class="name">
                                <b>Average check</b>
                            </div>
                            <div class="val">
                                <p>{{$establishment->ave_check->check}} ₸ per person</p>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="section section_features">
                    @foreach($establishment->features as $feature)
                        <div class="each_feature">
                            <div class="feature_icon">
                                <img src="{{asset($feature->image[0]->path)}}" alt="">
                            </div>
                            <div class="feature_name">
                                <p>{{$feature->name}}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
                <hr>
                <div class="section section_contacts">
                    <div class="address">
                        <a href="#">{{$establishment->address}}</a>
                    </div>
                    <div class="phone_nums">
                        <a href="#">{{$establishment->contacts->number1}}</a>,  <a href="#">{{$establishment->contacts->number2}}</a>
                    </div>
                    <div class="soc_nets">
                        <div class="instagram">
                            <a href="#"><img src="{{asset('test/img/main_images/instagram.png')}}" alt=""></a>
                        </div>
                        <div class="website">
                            <a href="#"><img src="{{asset('test/img/main_images/website.png')}}" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="booking_form">

            </div>
        </div>
    </div>
</div>
@endsection
