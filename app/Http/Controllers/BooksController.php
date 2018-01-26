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

    /**
     * Searching books with LIKE operators
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function search()
    {
        $title = \Request::get('title');
        $authors = \Request::get('authors');
        $isbn = \Request::get('isbn');

        $books = Book::where('title', 'like', '%' . $title . '%')
            ->where('authors', 'like', '%' . $authors . '%')
            ->where('isbn', 'like', '%' . $isbn . '%')->get();

        return view('user.books', compact('books'));
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
