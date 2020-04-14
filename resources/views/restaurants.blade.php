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
    </div>
@endsection
