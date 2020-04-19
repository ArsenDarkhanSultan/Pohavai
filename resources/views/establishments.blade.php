@extends('layout.main')
@section('content')
    <div class="container">
        <div class="headline">
            <h1>{{ucwords($est_type->name)}}s in {{$city->name}}</h1>
        </div>
        <div class="restaurants_main">
            @foreach($ests as $rest)
                <div class="card">
                    <img src="{{asset($rest->images[0]->path ?? '')}}" alt="">
                    <div class="card-body">
                        <a href="{{route('establishment', [strtolower($est_type->name), $rest->id])}}"><h2>{{$rest->name}}</h2></a>
                        <ol>
                            <li>{{implode(', ', $rest->cuisines->pluck('name')->toArray())}}</li>
                            <li>{{$rest->ave_check->check}}₸ per person</li>
                            <li>{{implode(', ', $rest->features->pluck('name')->toArray())}}</li>
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
                    <form method="get" action="{{route('establishments_filter', strtolower($est_type->name))}}">
                        <select class="select_cuisines btn-primary" name="cuisine">
                            <option selected value="any">Cuisine</option>
                            @foreach($cuisines as $cuisine)
                                <option value="{{$cuisine->slug}}">{{$cuisine->name}}</option>
                            @endforeach
                        </select>
                        <br>
                        @foreach($features as $feature)
                            <label id="{{$feature->slug}}">
                                {{$feature->name}}
                                <input class="{{$feature->slug}}" type="checkbox" name="{{$feature->slug}}" hidden>
                            </label>
                        @endforeach
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
