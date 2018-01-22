<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Books</title>
    <div>
        <ul>
            @foreach($books as $book)
                <li>{{$book->title}}</li>
            @endforeach
        </ul>
    </div>


</head>
</html>