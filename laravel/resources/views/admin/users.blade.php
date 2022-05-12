@extends('layouts.main')

@section('title')
    Пользователи
@endsection

@section('head')
    @parent
    <link href="/css/admin/user.css" type="text/css" rel="stylesheet">
@endsection

@section('content')
<table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">id</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
      </tr>
    </thead>
    <tbody>
    @foreach($users as $el)
      <tr>
        <th scope="row">{{$el->id}}</th>
        <td>{{$el->name}}</td>
        <td>{{$el->email}}</td>
        {{Form::open(['route' => ['UserUpdate', $el->id], 'method' => 'GET']) }}
        @csrf
        <td style="text-align: right"><button><i class="fa-solid fa-wrench" title="Изменить"></i></button></td>
        {{Form::close()}}
        {{Form::open(['route' => ['UserDelete', $el->id], 'method' => 'POST']) }}
        @csrf
        <td style="text-align: left"><button><i class="fa-solid fa-ban" title="Удалить"></i></button></td>
        {{Form::close()}}
      </tr>
    @endforeach
    </tbody>
</table>
<a href="{{route('AddUserGet')}}">Добавить пользователя</a>


@endsection