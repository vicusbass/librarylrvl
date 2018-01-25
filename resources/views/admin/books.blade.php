@extends('layouts.admin')

@section('content')
    <div class="row mt-1">
        <table class="table">
            <thead class="thead-light">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Authors</th>
                <th scope="col">Edition</th>
                <th scope="col">ISBN</th>
                <th scope="col">Available</th>
            </tr>
            </thead>
            <tbody>
            @foreach($books as $book)
                <tr>
                    <th scope="row">{{$book->id}}</th>
                    <td>{{$book->title}}</td>
                    <td>{{$book->authors}}</td>
                    <td>{{$book->year}}</td>
                    <td>{{$book->isbn}}</td>
                    <td>{{$book->available}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection

