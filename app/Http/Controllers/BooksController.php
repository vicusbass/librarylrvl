<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;

class BooksController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view('admin.books', compact('books'));
    }

    public function create()
    {
        return view('admin.forms.createbook');
    }

    public function store()
    {
        $this->validate(request(), [
            'title' => 'required',
            'isbn' => 'required',
            'year' => 'required|digits:4',
            'authors' => 'required',
            'copies' => 'required|numeric|min:0'
        ]);
        Book::create([
                'title' => request('title'),
                'isbn' => request('isbn'),
                'year' => request('year'),
                'authors' => request('authors'),
                'available' => request('copies'),
                'cover' => ''
            ]
        );

        return redirect('/admin/books');
    }
}
