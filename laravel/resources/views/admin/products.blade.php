@extends('layouts.main')

@section('title')
    Продукция
@endsection
@section('head')
    @parent
    <link href="/css/admin/product.css" type="text/css" rel="stylesheet">
@endsection
@section('content')
<table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">id</th>
        <th scope="col">Модель</th>
        <th scope="col">Процессор</th>
        <th scope="col">RAM</th>
        <th scope="col">Память</th>
        <th scope="col">Батарея</th>
        <th scope="col">Цена</th>
        <th scope="col">Кол-во</th>
      </tr>
    </thead>
    <tbody>
    @foreach($products as $el)
      <tr>
        <th scope="row">{{$el->id}}</th>
        <td>{{$el->name}}</td>
        <td>{{$el->processor}}</td>
        <td>{{$el->RAM}}</td>
        <td>{{$el->memory}}</td>
        <td>{{$el->battery}}</td>
        <td>{{$el->price}}</td>
        <td>{{$el->availability}}</td>
        {{Form::open(['route' => ['ProductUpdate', $el->id], 'method' => 'GET']) }}
        @csrf
        <td style="text-align: right"><button><i class="fa-solid fa-wrench" title="Изменить"></i></button></td>
        {{Form::close()}}
        {{Form::open(['route' => ['ProductDelete', $el->id], 'method' => 'POST']) }}
        @csrf
        <td style="text-align: left"><button><i class="fa-solid fa-ban" title="Удалить"></i></button></td>
        {{Form::close()}}
      </tr>
    @endforeach
    </tbody>
</table>
@endsection