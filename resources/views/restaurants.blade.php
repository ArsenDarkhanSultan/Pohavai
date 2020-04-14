@extends('layout.main')
@section('content')
    <div class="container">
        <div class="headline">

            <h1>Restaurants in {{$city->name}}</h1>
        </div>
        <div class="restaurants_main">
            @foreach($restaurants as $rest)
                <div class="card">
                    <img src="{{asset($rest->images[0]->path)}}" alt="">
                    <div class="card-body">
                        <a href="#"><h2>{{$rest->name}}</h2></a>
                        <ol>
                            <li>{{$rest->cuisines}}</li>
                            <li>{{$rest->ave_check}}₸ per person</li>
                            <li>{{$rest->features}}</li>
                        </ol>
                        <p>{{$rest->description}}</p>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="filters">
            <div class="card border-info mb-3">
                <div class="card-header">Filters</div>
                <div class="card-body text-info">
                    <form method="get" action="#">
                        <select class="select_cuisines" name="cuisine">
                            <option selected value="any">Cuisine</option>
                            <option value="Eastern">Eastern</option>
                            <option value="European">European</option>
                            <option value="Italian">Italian</option>
                            <option value="Mediterranean">Mediterranean</option>
                            <option value="pan-Asian">pan-Asian</option>
                            <option value="Chinese">Chinese</option>
                            <option value="Japanese">Japanese</option>
                            <option value="Caucasian">Caucasian</option>
                            <option value="Kazakh">Kazakh</option>
                        </select>
                        <select class="select_cuisines" name="hookah">
                            <option selected value="any">Hookah</option>
                            <option value="yes">Available</option>
                            <option value="no">Not available</option>
                        </select>
                        <select class="select_cuisines" name="wifi">
                            <option selected value="any">Wi-Fi</option>
                            <option value="yes">Available</option>
                            <option value="no">Not available</option>
                        </select>
                        <select class="select_cuisines" name="live_music">
                            <option selected value="any">Live music</option>
                            <option value="yes">Available</option>
                            <option value="no">Not available</option>
                        </select>
                        <label id="halal_lb">
                            Halal
                            <input class="halal_lb" type="checkbox" name="halal" hidden>
                        </label>
                        <label id="veg_lb">
                            Vegetarian
                            <input class="veg_lb" type="checkbox" name="vegetarian" hidden>
                        </label>
                        <label id="rate_lb">
                            Rating > 4.5
                            <input class="rate_lb" type="checkbox" name="rating" hidden>
                        </label>
                        <button class="btn btn-primary" type="submit">Show</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
