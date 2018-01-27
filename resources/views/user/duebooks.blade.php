@extends('layouts.user')

@section('content')
    <div class="row mt-1">
        @if (count($result) > 0)
            <table class="table">
                <thead class="thead-light">

                <tr>
                    <th scope="col">Title</th>
                    <th scope="col">Authors</th>
                    <th scope="col">Deadline</th>
                </tr>
                </thead>
                <tbody>
                @foreach($result as $book)
                    <tr>
                        <th scope="row">{{$book->title}}</th>
                        <td>{{ $book->authors }}</td>
                        <td>{{ $book->expiration_date }}</td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        @else
            <h2>You have no rentals. Shame, shame, shame.</h2>
        @endif
    </div>
@endsection

