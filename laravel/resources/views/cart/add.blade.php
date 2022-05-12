@extends('layouts.main')

@section('title')
    Корзина
@endsection
@section('head')
    @parent
    <link rel="stylesheet" type="text/css" href="/css/cart/cart.css">
    <link rel="stylesheet" type="text/css" href="/css/cart/cart_responsive.css">
    <script src="/js/cart/cart.js"></script>
@endsection
@section('content')
<div class="cart_info">
    <div class="row">
        <div class="col">
            <!-- Column Titles -->
            <div class="cart_info_columns clearfix">
                <div class="cart_info_col cart_info_col_product">Название</div>
                <div class="cart_info_col cart_info_col_price">Цена</div>
                <div class="cart_info_col cart_info_col_quantity">Количество</div>
                <div class="cart_info_col cart_info_col_total">Стоимость</div>
            </div>
        </div>
    </div>
@foreach ($cart as $el)
    <div class="row cart_items_row">
        <div class="col">
            <!-- Cart Item -->
            <div class="cart_item d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-start">
                <!-- Name -->
                <div class="cart_item_product d-flex flex-row align-items-center justify-content-start">
                    <div class="cart_item_image">
                        <div><img src="/media/main/product_1.webp" alt=""></div>
                    </div>
                    <div class="cart_item_name_container">
                        <div class="cart_item_name"><a href="#">{{$el->productName}}</a></div>
                        {{Form::open(['action' => 'App\Http\Controllers\CartController@destroy', 'method' => 'POST'])}}
                        {{Form::hidden('id', $el->cartsId, ['class' => 'form-control'])}}
                        {{Form::submit('Удалить', ['class' => 'button main_button'])}}
                        {{Form::close()}}
                    </div>
                </div>
                <!-- Price -->
                <div class="cart_item_price">
                    {{$el->price}}
                </div>
                <!-- Quantity -->
                <div style="color: black" class="cart_item_quantity">
                        {{$el->quantity}}
                </div>
                <!-- Total -->
                <div class="cart_item_total">
                    {{$el->price}}
                </div>
            </div>
        </div>
    </div>	   
@endforeach
@if ($count !== 0)
<div class="row row_cart_buttons">
    <div class="col">
        <div class="cart_buttons d-flex flex-lg-row flex-column align-items-start justify-content-start">
            <div class="button continue_shopping_button"><a href="{{route('home')}}">Продолжить покупки</a></div>
            <div class="cart_buttons_right ml-lg-auto">
                {{Form::open(['action' => 'App\Http\Controllers\CartController@destroyAll', 'method' => 'POST'])}}
                <b>{{Form::submit('Очистить корзину', ['class' => 'button main_button', 'style'=>'font-weight: bold;'])}}</b>
                {{Form::close()}}
            </div>
        </div>
    </div>
</div>
<div class="row row_extra">
    <div class="col-lg-4">
        <div class="col-lg-6 offset-lg-2">
            <div class="cart_total">
                <div class="section_title">Общая стоимость</div>
                    <div class="cart_total_container">
                        <div class="total_info">
                            <p>Итого:</p>
                            <p>{{$sum}}</p>
                        </div>
                    </div>
                <div class="button checkout_button">
                    <a id="order" href="">Оформить заказ</a>
                </div>
            </div>
        </div>
    </div>
</div> 
@endif
@endsection
@section ('styleCart')
style = "";
@endsection