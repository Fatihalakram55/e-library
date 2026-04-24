<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Borrow;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $title           = 'Dashboard';

        $totalBooks      = Book::count();
        $totalUsers      = User::count();
        $totalCategories = Category::count();
        $totalAuthors    = Author::count();

        $activeBorrows  = Borrow::whereIn('status', ['diajukan', 'dipinjem'])->count();
        $overdueBorrows = Borrow::whereIn('status', ['diajukan', 'dipinjem'])
                                ->where('due_date', '<', now())
                                ->count();
        $pendingBorrows = Borrow::where('status', 'diajukan')->count();

        $recentBorrows  = Borrow::latest()->take(5)->get();
        $recentBooks    = Book::with(['author', 'category'])->latest()->take(2)->get();

        return view('dashboard.dashboard', compact(
            'title',
            'totalBooks',
            'totalUsers',
            'totalCategories',
            'totalAuthors',
            'activeBorrows',
            'overdueBorrows',
            'pendingBorrows',
            'recentBorrows',
            'recentBooks',
        ));
    }
}