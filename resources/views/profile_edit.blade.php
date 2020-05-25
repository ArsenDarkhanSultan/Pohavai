@php
    $img_size = 200;
    $user = Auth::user();
@endphp
@extends('layout.main')
@section('content')
    <div class="container text-justify">
        <div class="card p-5 w-50">
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul style="padding-left: 0; margin-left: 10px">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{route('updateProfile')}}" method="POST">
                {{csrf_field()}}
{{--                <div class="form-group">--}}
{{--                    <label for="exampleFormControlFile1">Изменить аватар</label>--}}
{{--                    <input name="avatar" type="file" class="form-control-file" id="avatar">--}}
{{--                </div>--}}
                <div class="form-group">
                    <label for="exampleInputUsername1">Имя</label>
                    <input name="name" class="form-control" id="exampleInputUsername1" aria-describedby="usernameHelp" placeholder="Введите ваше имя">
                    <small id="usernameHelp" class="form-text text-muted"></small>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Электронная почта</label>
                    <input name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Введите ваше имя">
                    <small id="emailHelp" class="form-text text-info">Изменив электронную почту, вам потребуется подтвердить её повторно.</small>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Пароль</label>
                    <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Введите ваш пароль">
                </div>
                <br>
                <button type="submit" class="btn btn-primary">Сохранить</button>
            </form>
        </div>
    </div>
@endsection
