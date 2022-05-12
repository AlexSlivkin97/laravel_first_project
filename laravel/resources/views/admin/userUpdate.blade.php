@extends('layouts.main')

@section('title')
    Обновление данных
@endsection
@section('head')
    @parent
    <link href="/css/admin/user.css" type="text/css" rel="stylesheet">
@endsection
@section('content')
{{Form::open(['action' => 'App\Http\Controllers\Admin\UserController@Update', 'class' => 'formUpdate', 'method' => 'POST']) }}
@csrf
    @foreach ($users as $el)
    <div class="form-group row">
        {{Form::label('Name', '',['class'=>"col-sm-2 col-form-label"])}}
        {{Form::text('Name', $el->name,['class' => 'col-sm-4 col-form-label'])}}
    </div>
    <div class="form-group row">
        {{Form::label('Email', '',['class'=>"col-sm-2 col-form-label"])}}
        {{Form::text('Email', $el->email,['class' => 'col-sm-4 col-form-label'])}}
        {{Form::hidden('id', $el->id)}}
        {{Form::submit('Сохранить', ['class'=>'btn btn-dark'])}}
    </div>
    @endforeach
{{Form::close()}}
@endsection