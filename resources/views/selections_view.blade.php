@extends('layout.main')
@php
$features = \App\Models\Feature::all();
$cuisines = \App\Models\Cuisine::all();
$types = \App\Models\Type::all();
@endphp
@section('content')
<div class="container">
    <div style="margin-left: 15%; margin-right: 15%; background-color: deepskyblue">
        <h1>Выберите все что вам по душе</h1>
    </div>
    <form method="post" action="{{route('processing')}}">
        {{csrf_field()}}
        <div class="selection">
            <div class="selection_est_types">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title" style="margin: 0">Заведения</h4>
                    </div>
                    <div class="card-body">
                        <label for="select_type" class="card-text">Выберите вид заведения.</label>
                        <br>
                        <select class="select_type btn-primary" id="select_type" name="type">
                            <option selected value="any">Вид</option>
                            @foreach($types as $type)
                                <option value="{{$type->name}}">{{$type->title}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="selection_cuisines">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title" style="margin: 0">Кухни</h4>
                    </div>
                    <div class="card-body">
                        <p class="card-text">Какие бы кухни вы предпочли попробовать?</p>
                        @foreach($cuisines as $cuisine)
                            <label id="{{$cuisine->slug}}">
                                {{$cuisine->name}}
                                <input class="{{$cuisine->slug}}" type="checkbox" name="cuisines[{{$cuisine->slug}}]" hidden>
                            </label>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="selection_features">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title" style="margin: 0">Особенности</h4>
                    </div>
                    <div class="card-body">
                        <p class="card-text">Хотите больше особенностей?</p>
                        @foreach($features as $feature)
                            <label id="{{$feature->slug}}">
                                {{$feature->name}}
                                <input class="{{$feature->slug}}" type="checkbox" name="features[{{$feature->slug}}]" hidden>
                            </label>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <button style="margin-top: 4%; width: 60%; font-size: 30px" class="btn btn-primary" type="submit">Показать подборки</button>
    </form>
    @include('layout.partials.footer')
</div>

@endsection
