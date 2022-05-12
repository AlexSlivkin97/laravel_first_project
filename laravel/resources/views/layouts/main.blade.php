<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @section('head')
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">  
        <title>@section('title') Home @show</title>
        <link rel="stylesheet" type="text/css" href="/css/main/main_styles.css">
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" inintegrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link href="/media/fontawesome-free-6.1.1-web/css/all.css" rel="stylesheet">
        <script src="/js/jquery-3.6.0.min.js"></script>
        @endsection
        @yield('head')
    </head>
    <body>
        <div class="container">
        @section('header')
        <header class="header">
            <div class="header_container">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="header_content d-flex flex-row align-items-center justify-content-start">
                                <div class="logo">
                                    <a href="/"><img src={{"/media/logo/logo1.png"}}></a>
                                </div>
                                <nav class="main_nav">
                                    <ul>
                                        <li class="hassubs active">
                                            <a href="/">Главная</a>
                                        </li>
                                            
                                            @foreach ($is_admin as $el)
                                            @if ($el->role == 1)
                                            @auth
                                            <li class="hassubs active">
                                                <a href="/">Админ</a>
                                                <ul>
                                                    <li>
                                                        <a href="{{route('AdminUsers')}}">Пользователи</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{route('AdminProducts')}}">Продукция</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            @endauth
                                            @else
                                            123 
                                            @endif
                                            @endforeach
                                        </li>
                                        <li>
                                            <a href="/">Offers</a>
                                        </li>
                                        <li>
                                            <a href="/">Контакты</a>
                                        </li>
                                    </ul>
                                </nav>
                                    <div @section ('styleCart')style="margin-bottom: 20px;" @show class="header_extra ml-auto">
                                        <div class="shopping_cart">
                                            <a href="{{route('CartIndex')}}">
                                                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 489 489" style="enable-background:new 0 0 489 489;" xml:space="preserve">
                                                    <g>
                                                        <path d="M440.1,422.7l-28-315.3c-0.6-7-6.5-12.3-13.4-12.3h-57.6C340.3,42.5,297.3,0,244.5,0s-95.8,42.5-96.6,95.1H90.3
                                                                                c-7,0-12.8,5.3-13.4,12.3l-28,315.3c0,0.4-0.1,0.8-0.1,1.2c0,35.9,32.9,65.1,73.4,65.1h244.6c40.5,0,73.4-29.2,73.4-65.1
                                                                                C440.2,423.5,440.2,423.1,440.1,422.7z M244.5,27c37.9,0,68.8,30.4,69.6,68.1H174.9C175.7,57.4,206.6,27,244.5,27z M366.8,462
                                                                                H122.2c-25.4,0-46-16.8-46.4-37.5l26.8-302.3h45.2v41c0,7.5,6,13.5,13.5,13.5s13.5-6,13.5-13.5v-41h139.3v41
                                                                                c0,7.5,6,13.5,13.5,13.5s13.5-6,13.5-13.5v-41h45.2l26.9,302.3C412.8,445.2,392.1,462,366.8,462z">
                                                        </path>
                                                    </g>
                                                </svg>
                                                @if (Route::has('login'))
                                                    @auth
                                                    <div>
                                                        Корзина <span>({{$count}})</span>
                                                    </div>
                                                    @else
                                                    <div>
                                                        Корзина <span>(0)</span>
                                                    </div> 
                                                    @endauth
                                                @endif
                                                                                               
                                            </a>
                                        </div>
                                    </div>
                            </div>
                        </div>
                            @if (Route::has('login'))
                                @auth
                                <div class="col-md-1">
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="btn btn-dark">
                                            {{ __('Выход') }}
                                        </button>
                                    </form>
                                </div>
                            @else
                            <div class="col-md-3">
                                <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline"><button type="button" class="btn btn-dark">Войти</button></a>
                                    @if (Route::has('register'))
                                        <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline"><button type="button" class="btn btn-dark">Зарегистироваться</button></a>
                            </div>
                                    @endif
                            @endauth
                            @endif
                    </div>
                </div>
            </div>
        </header>
            @show
            @include('error.message')
            @yield('content')

            @section('footer')
                <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
                    <div class="col-md-4 d-flex align-items-center">
                        <a href="/" class="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1">
                            <svg class="bi" width="30" height="24"><use xlink:href="#bootstrap"></use></svg>
                        </a>
                        <span class="text-muted">© 2022 Slivki, Inc</span>
                    </div>
                    <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
                        <li class="ms-3"><a class="text-muted" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#twitter"></use></svg></a></li>
                        <li class="ms-3"><a class="text-muted" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#instagram"></use></svg></a></li>
                        <li class="ms-3"><a class="text-muted" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#facebook"></use></svg></a></li>
                    </ul>
                </footer> 
            @show
        </div>
    </body>
</html>
