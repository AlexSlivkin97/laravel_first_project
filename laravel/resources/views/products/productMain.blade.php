@extends('layouts.main')

@section('content')
    {{ Form::open(['action' => 'App\Http\Controllers\SearchController@Search', 'class' => 'needs-validation', 'method' => 'GET']) }}
    @csrf
    <div class="row g-3">
        <div class="col-6">
            {{Form::label('search', '',['class' => 'form-label'])}}
            {{Form::text('search', '',['class' => 'form-control'])}}
            {{Form::submit('Найти', ['class' => 'w-100 btn btn-primary btn-lg'])}}
        </div>
    </div>
    {!! Form::close() !!}
    @if(isset($data))
    <div class="products">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="product_grid">
                        @foreach ($data as $el)
                        <a href= {{$el->id}}>  
                        <div class="product" style="">
                            <div class="product_image"><img src="/media/main/product_1.webp" alt=""></div>
                            <div class="product_extra product_new"><a href="">New</a></div>
                            <div class="product_content">
                                <div class="product_title"><a href="product.html">{{$el->name}}</a></div>
                                <div class="product_price">{{$el->price}}</div>
                            </div>
                        </div> 
                        </a>
                        @endforeach
                        @else
                        <h3 style='text-align:center'>Товара нету</h3>
                        @endif        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection