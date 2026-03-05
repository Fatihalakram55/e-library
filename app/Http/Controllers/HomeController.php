<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $title = 'Homepage';
        $books = Book::latest('published_at')->take(3)->get();

        // return dd($books);
        return view('homepage', compact('title', 'books'));
    }
}
