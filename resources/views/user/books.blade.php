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

            <table class="table table-bordered table-hover">
                <thead>
                <th>Name</th>
                </thead>
                <tbody>
                @foreach($books as $book)
                    <tr>
                        <td>{{ $book->title }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

