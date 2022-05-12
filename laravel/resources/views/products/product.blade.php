@extends('layouts.main')

@section('head')
    @parent
    <link rel="stylesheet" type="text/css" href="/css/product/product.css">
    <link rel="stylesheet" type="text/css" href="/css/product/product_responsive.css">
    <script src="/js/product/image.js"></script>
@endsection
@section('styleCart')
    style=''
@endsection
@section('content')
@foreach ($data as $el)
<div class="product_details">
    <div class="container">
        <div class="row details_row">
            <div class="col-lg-6">
                <div class="details_image">
                    <div class="details_image_large">
                        <img id='image' class="image" src="/media/main/product_1.webp" alt="" data-pagespeed-url-hash="3557063029"></div>
                        <div class="details_image_thumbnails d-flex flex-row align-items-start justify-content-between">
                            <div class="details_image_thumbnail active" data-image="images/details_1.jpg"><img class="image" src="/media/main/product_1.webp" alt=""></div>
                            <div class="details_image_thumbnail" data-image="/media/main/cat.jpg"><img class="image" src="/media/main/cat.jpg" alt=""></div>
                            <div class="details_image_thumbnail" data-image="/media/main/product_1.webp"><img class="image" src="/media/main/product_1.webp" alt=""></div>
                            <div class="details_image_thumbnail" data-image="images/details_4.jpg"><img class="image" src="/media/main/product_1.webp" alt=""></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div style="margin-top: 40px;" class="details_content">
                        <div class="details_name">{{$el->name}}</div>
                        <div class="details_price">{{$el->price}} Руб</div>
                        <div class="in_stock_container">
                            <div class="availability">В наличии:</div>
                            @if ($el->availability != 0)
                            <span>{{$el->availability}}</span>
                            @else
                            <span>Нету</span>
                            @endif
                            
                        </div>
                    <div class="details_text">
                        <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. Phasellus id nisi quis justo tempus mollis sed et dui. In hac habitasse platea dictumst. Suspendisse ultrices mauris diam. Nullam sed aliquet elit. Mauris consequat nisi ut mauris efficitur lacinia.</p>
                    </div>
                    @if(Route::has('login'))
                    @auth
                    {!! Form::open(['action' => 'App\Http\Controllers\CartController@CartSave', 'method' => 'POST']) !!}
                    @csrf
                    <div class="btn-group">
                        {{Form::hidden('id_product', $el->id, ['class' => 'form-control'])}}
                        {{Form::submit('В корзину', ['class' => 'button main_button'])}}
                    </div>
                
                    <div class="product_quantity_container">
                        <div class="product_quantity clearfix">
                            {{Form::text('Количество', "1", ['class'=>'quantity_input', 'pattern' => '[0-9]*'])}}
                            {!! Form::close() !!}
                            <div class="quantity_buttons">
                                <div id="quantity_inc_button" class="quantity_inc quantity_control"><i class="fa fa-chevron-up" aria-hidden="true"></i></div>
                                <div id="quantity_dec_button" class="quantity_dec quantity_control"><i class="fa fa-chevron-down" aria-hidden="true"></i></div>
                            </div>
                        </div>
                    </div>
                    @else
                        <span>Авторизируйтесь, чтобы производить покупки.</span>
                    @endauth
                    @endif
                </div>
            </div>
        </div>
        <div class="row description_row">
            <div class="col">
                <div class="description_title_container">
                    <div class="description_title">Описание</div>
                </div>
                <div class="description_text">
                    <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. Phasellus id nisi quis justo tempus mollis sed et dui. In hac habitasse platea dictumst. Suspendisse ultrices mauris diam. Nullam sed aliquet elit. Mauris consequat nisi ut mauris efficitur lacinia.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@endforeach