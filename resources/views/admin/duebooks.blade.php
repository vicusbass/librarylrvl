@extends('layouts.admin')

@section('content')
    <div class="row mt-1">
        @if (count($result) > 0)
            <table class="table">
                <thead class="thead-light">

                <tr>
                    <th scope="col">User</th>
                    <th scope="col">Title</th>
                    <th scope="col">Authors</th>
                    <th scope="col">Deadline</th>
                    <th scope="col">Return</th>
                </tr>
                </thead>
                <tbody>
                @foreach($result as $book)
                    <tr class='{{$book->expiration_date < \Carbon\Carbon::now() ? 'table-danger':''}}'>
                        <th scope="row">{{$book->name}}</th>
                        <td>{{$book->title}}</td>
                        <td>{{ $book->authors }}</td>
                        <td>{{ $book->expiration_date }}</td>
                        <td><a class='btn btn-success' href='returnbook/{{$book->rental_id}}'><i
                                        class='fa fa-cart-plus' title='return'></i></a></td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        @else
            <h2>There are no rentals. Shame, shame, shame.</h2>
        @endif
    </div>
@endsection

