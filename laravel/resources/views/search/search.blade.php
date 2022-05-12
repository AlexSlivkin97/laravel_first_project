@extends('layouts.main')

@section('content')
    @foreach ($data as $el)
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            <div class="col">
                <div class="card shadow-sm">
                    <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
                    <div class="card-body">
                        <table class="table table-striped table-sm">
                            <tr>
                                <th scope="col">Название</th>
                                <td>{{ $el->name }}</td>
                            </tr>
                            <tr>
                                <th scope="col">Процессор</th>
                                <td>{{ $el->processor }}</td>
                            </tr>
                            <tr>
                                <th scope="col">Оперативная память</th>
                                <td>{{ $el->RAM }}</td>
                            </tr>
                            <tr>
                                <th scope="col">Память</th>
                                <td>{{ $el->memory }}</td>
                            </tr>
                            <tr>
                                <th scope="col">Батарея</th>
                                <td>{{ $el->battery }}</td>
                            </tr>
                        </table>
                </div>
            </div>
        </div>
    @endforeach
@endsection