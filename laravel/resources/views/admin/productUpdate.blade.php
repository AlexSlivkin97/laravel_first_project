@extends('layouts.main')

@section('title')
    Обновление данных
@endsection
@section('head')
    @parent
    <link href="/css/admin/user.css" type="text/css" rel="stylesheet">
@endsection
@section('content')
{{Form::open(['action' => 'App\Http\Controllers\Admin\AdminProductController@Update', 'class' => 'formUpdate', 'method' => 'POST']) }}
@csrf
    @foreach ($product as $el)
    <div class="form-group row">
        {{Form::label('Модель', '',['class'=>"col-sm-2 col-form-label"])}}
        {{Form::text('name', $el->name,['class' => 'col-sm-4 col-form-label'])}}
    </div>
    <div class="form-group row">
        {{Form::label('Процессор', '',['class'=>"col-sm-2 col-form-label"])}}
        {{Form::text('processor', $el->processor,['class' => 'col-sm-4 col-form-label'])}}
    </div>
    <div class="form-group row">
        {{Form::label('RAM', '',['class'=>"col-sm-2 col-form-label"])}}
        {{Form::text('RAM', $el->RAM,['class' => 'col-sm-4 col-form-label'])}}
    </div>
    <div class="form-group row">
        {{Form::label('Память', '',['class'=>"col-sm-2 col-form-label"])}}
        {{Form::text('memory', $el->memory,['class' => 'col-sm-4 col-form-label'])}}
    </div>
    <div class="form-group row">
        {{Form::label('Батарея', '',['class'=>"col-sm-2 col-form-label"])}}
        {{Form::text('battery', $el->battery,['class' => 'col-sm-4 col-form-label'])}}
    </div>
    <div class="form-group row">
        {{Form::label('Цена', '',['class'=>"col-sm-2 col-form-label"])}}
        {{Form::text('price', $el->price,['class' => 'col-sm-4 col-form-label'])}}
    </div>
    <div class="form-group row">
        {{Form::label('Кол-во', '',['class'=>"col-sm-2 col-form-label"])}}
        {{Form::text('availability', $el->availability,['class' => 'col-sm-4 col-form-label'])}}
        {{Form::hidden('id', $el->id)}}
        {{Form::submit('Сохранить', ['class'=>'btn btn-dark'])}}
    </div>
    @endforeach
{{Form::close()}}
@endsection