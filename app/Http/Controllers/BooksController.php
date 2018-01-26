<?php

namespace App\Http\Controllers;

use App\Rental;
use Illuminate\Http\Request;
use App\Book;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

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
        if (empty($title) && empty($authors) && empty($isbn)) {
            $books = [];
        } else {
            $books = Book::where('title', 'like', '%' . $title . '%')
                ->where('authors', 'like', '%' . $authors . '%')
                ->where('isbn', 'like', '%' . $isbn . '%')->orderBy('title')->get();
        }
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

    public function rentbook($id)
    {
        $book = Book::find($id);
        $userid = Auth::id();
        //check if the user has it already
        $rented = Rental::where('book_id', $id)->where('user_id', $userid)->get();
        if (count($rented) > 0) {
            return view('user.rental')->with('message', 'You already rented this book.');
        } else {
            //decrease number of available book and create a rentals entry
            $book->available = $book->available - 1;
            $book->save();

            Rental::create([
                'book_id' => $id,
                'user_id' => $userid,
                'expiration_date' => Carbon::now()->addDays(30)
            ]);
            return view('user.rental')->with('message', 'You have the book, do not forget to return it in 30 days!');
        }
    }

    public function duebooks_user()
    {
        $userid = Auth::id();
        //get all rented books by current user
        $result = Rental
            ::where('user_id', $userid)
            ->join('books', 'books.id', '=', 'rentals.book_id')
            ->select('rentals.id', 'books.title', 'books.authors', 'rentals.expiration_date')
            ->orderBy('rentals.expiration_date', 'desc')
            ->getQuery()
            ->get();
        return view('user.duebooks', compact('result'));
    }
}
