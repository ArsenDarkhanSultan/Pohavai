{{--@extends('layout.main')--}}
{{--@php--}}
{{--    $cuisines = \App\Models\Cuisine::all();--}}
{{--    $features = \App\Models\Feature::all();--}}
{{--@endphp--}}
{{--@section('content')--}}
{{--    <div class="container">--}}
{{--        <div class="headline mb-5">--}}
{{--            <h1>Избранное</h1>--}}
{{--        </div>--}}
{{--        <div class="restaurants_main w-100 m-0 p-0">--}}
{{--            {{$ests->links()}}--}}
{{--            @foreach($ests->chunk(4) as $chunk)--}}
{{--                <div class="row mb-3">--}}
{{--                    @foreach($chunk as $rest)--}}
{{--                        <div class="col-3">--}}
{{--                            <div class="card" style="height: 400px;">--}}
{{--                                <div class="" style="height: 200px; overflow: hidden; vertical-align: middle">--}}
{{--                                    <img class="card-img-top" src="{{asset($rest->images[0]->path ?? '')}}" alt="">--}}
{{--                                </div>--}}
{{--                                <div class="card-body">--}}
{{--                                    <a href="{{route('establishment', [strtolower($rest->type->name), $rest->id])}}"><h2>{{$rest->name}}</h2></a>--}}
{{--                                    <ol>--}}
{{--                                        <li>{{implode(', ', $rest->cuisines->pluck('name')->toArray())}}</li>--}}
{{--                                        <li>{{$rest->ave_check->check}}₸ на человека</li>--}}
{{--                                        <li>{{implode(', ', $rest->features->pluck('name')->toArray())}}</li>--}}
{{--                                    </ol>--}}
{{--                                    <p>{{mb_substr($rest->description, 0, 60)}}</p>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    @endforeach--}}
{{--                </div>--}}
{{--            @endforeach--}}
{{--            {{$ests->links()}}--}}
{{--        </div>--}}
{{--    </div>--}}
{{--@endsection--}}

@extends('layout.main')
@php
    $cuisines = \App\Models\Cuisine::all();
    $features = \App\Models\Feature::all();
@endphp
@section('content')
    <div class="container restaurants_container">
        <div class="headline">
            <h1>Избранные</h1>
        </div>
        <div class="restaurants_main">
            {{$ests->links()}}
            @foreach($ests as $rest)
                <div class="card">
                    <img src="{{asset($rest->images[0]->path ?? '')}}" alt="">
                    <div class="card-body">
                        <a href="{{route('establishment', [strtolower($rest->type->name), $rest->id])}}"><h2>{{$rest->name}}</h2></a>
                        <ol>
                            <li>{{implode(', ', $rest->cuisines->pluck('name')->toArray())}}</li>
                            <li>{{$rest->ave_check->check}}₸ на человека</li>
                            <li>{{implode(', ', $rest->features->pluck('name')->toArray())}}</li>
                        </ol>
                        <p class="description">{{mb_substr($rest->description, 0, 700)}}</p>
                    </div>
                </div>
            @endforeach
            <br>
            {{$ests->links()}}
        </div>
{{--        <div class="filters">--}}
{{--            <div class="card border-info mb-3">--}}
{{--                <div class="card-header">Фильтры</div>--}}
{{--                <div class="card-body text-info">--}}
{{--                    <form method="get" action="{{route('establishments_filter', strtolower($est_type->name))}}">--}}
{{--                        <select class="select_cuisines btn-primary" name="cuisine">--}}
{{--                            <option selected value="any">Кухни</option>--}}
{{--                            @foreach($cuisines as $cuisine)--}}
{{--                                <option value="{{$cuisine->slug}}">{{$cuisine->name}}</option>--}}
{{--                            @endforeach--}}
{{--                        </select>--}}
{{--                        <br>--}}
{{--                        @foreach($features as $feature)--}}
{{--                            <label id="{{$feature->slug}}">--}}
{{--                                {{$feature->name}}--}}
{{--                                <input class="{{$feature->slug}}" type="checkbox" name="features[{{$feature->slug}}]" hidden>--}}
{{--                            </label>--}}
{{--                        @endforeach--}}
{{--                        <button class="btn btn-primary" type="submit">Показать</button>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
    </div>
    @include('layout.partials.footer')
@endsection
