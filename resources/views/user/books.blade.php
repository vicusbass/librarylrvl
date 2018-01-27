@extends('layouts.user')

@section('content')
    <div class="row mt-1" id="searchBookForm">
        <div class="col-6">
            {!! Form::open(['url' => '/user/books', 'method'=>'get', 'class' => 'form-horizontal']) !!}
            <div class="form-group row">
                <label for="title" class="col-sm-2 col-form-label">Title</label>
                <div class="col-sm-10">
                    {!! Form::text('title', Request::get('title'), ['class' => 'form-control', 'placeholder' => 'Title']) !!}
                </div>
            </div>
            <div class="form-group row">
                <label for="authors" class="col-sm-2 col-form-label">Authors</label>
                <div class="col-sm-10">
                    {!! Form::text('authors', Request::get('authors'), ['class' => 'form-control', 'placeholder' => 'Authors']) !!}
                </div>
            </div>
            <div class="form-group row">
                <label for="isbn" class="col-sm-2 col-form-label">ISBN</label>
                <div class="col-sm-10">
                    {!! Form::number('isbn', Request::get('isbn'), ['class' => 'form-control', 'placeholder' => 'ISBN']) !!}
                </div>
            </div>
            {!! Form::submit('Search', ['class' => 'btn btn-primary'] ) !!}
            {!! Form::close()  !!}

        </div>
        @if (count($books) > 0)
            <table class="table">
                <thead class="thead-light">

                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Authors</th>
                    <th scope="col">Edition</th>
                    <th scope="col">ISBN</th>
                    <th scope="col">Available</th>
                    <th scope="col">Rent</th>
                </tr>
                </thead>
                <tbody>
                @foreach($books as $book)
                    <tr>
                        <th scope="row">{{$book->id}}</th>
                        <td>{{ $book->title }}</td>
                        <td>{{ $book->authors }}</td>
                        <td>{{ $book->year }}</td>
                        <td>{{ $book->isbn }}</td>
                        <td>{{ $book->available }}</td>
                        <td><a class='btn btn-success' href='rentbook/{{$book->id}}'><i class='fa fa-cart-plus'
                                                                                        title='rent'></i></a></td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        @endif
    </div>
@endsection

