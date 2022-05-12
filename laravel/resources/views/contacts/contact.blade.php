@extends('layouts.main')
@section('title')
    Контакт
@endsection
@section('head')
    @parent
    <link rel="stylesheet" type="text/css" href="css/contact.css">
@endsection
@section('content')
<div  class="contacts">
    <h2>Вы можете отправить мне письмо!</h2>
    <form class="needs-validation" novalidate="">
        <div class="row g-3">
            <div class="col-6">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" placeholder="you@example.com">
                <div class="invalid-feedback">
                    Please enter a valid email address for shipping updates.
                </div>    
                <label for="exampleFormControlTextarea1"></label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                <button class="w-100 btn btn-primary btn-lg" type="submit">Отправить</button>
            </div>
        </div>
    </form>
</div>
@endsection