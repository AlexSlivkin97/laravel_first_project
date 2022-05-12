@extends('layouts.main')

@section('title')
    Добавление пользователя
@endsection

@section('head')
    @parent
    <link href="/css/admin/add.css" type="text/css" rel="stylesheet">
@endsection

@section('content')
<div class="contain">
    {{Form::open(['action' => 'App\Http\Controllers\Admin\UserController@AddUserPost', 'method' => 'POST']) }}
    @csrf
    <div class="form-group row">
        {{Form::label('name', '',['class'=>'col-sm-2 col-form-label'])}}
        <div class="col-sm-10">
            {{Form::text('name', '',['class'=>'col-sm-4 col-form-label'])}}
        </div>
    </div>
    <div class="form-group row">
        {{Form::label('email', '',['class'=>'col-sm-2 col-form-label'])}}
        <div class="col-sm-10">
            {{Form::text('email', '',['class'=>'col-sm-4 col-form-label'])}}
        </div>
    </div>
    <div class="form-group row">
        {{Form::label('password', '',['class'=>'col-sm-2 col-form-label'])}}
        <div class="col-sm-10">
            {{Form::text('password', '',['class'=>'col-sm-4 col-form-label'])}}
        </div>
    </div>
        {{Form::submit('Сохранить', ['class'=>'btn btn-dark'])}}
        {{Form::close()}}
</div>
@endsection