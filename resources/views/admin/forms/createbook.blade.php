@extends('layouts.admin')

@section('content')
    <div class="row mt-1" id="addBookForm">
        <div class="col-6">
            <form method="POST" role="form" id="addBook" name="addBook" action="/admin/books/create">
                {{csrf_field()}}
                <div class="form-group row">
                    <label for="title" class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="title" id="title" placeholder="Title">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="authors" class="col-sm-2 col-form-label">Authors</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="authors" id="authors" placeholder="Authors">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="isbn" class="col-sm-2 col-form-label">ISBN</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" name="isbn" id="isbn" placeholder="ISBN">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="year" class="col-sm-2 col-form-label">Year</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" name="year" id="year" placeholder="Year">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="copies" class="col-sm-2 col-form-label">Copies</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" name="copies" id="copies"
                               placeholder="Number of copies">
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Save book</button>
                </div>
                @include('layouts.errors')
            </form>
        </div>
    </div>
@endsection

