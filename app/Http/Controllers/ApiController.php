<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::all();

        return response()->json($books);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'slug' => 'required|max:255|unique:books',
            'cover' => 'required|image|max:1024',
            'body' => 'required',
            'published_at' => 'date',
            'category_id' => 'required',
            'author_id' => 'required'
        ]);

        if ($request->file('cover')) {
            $validatedData['cover'] = $request->file('cover')->store('book-covers', 'public');
        }

        $book = Book::create($validatedData);

        return response()->json([
            'message' => "Book is created successfully!",
            'data' => $book
        ],201);
    }

    /**
     * Display the specified resource.
     */
    public function show(String $id)
    {
        $book = Book::find($id);

        if ($book) {
            return response()->json($book,200);
        }

        return response()->json(['messege' => "Book not found!"], 404);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $book = Book ::find($id);

        if(!$book){
            return response()->json(['messege' => 'Buku Tidak ditemukan!'],404);
        } else {
            $rules = [
                'name' => 'sometimes|max:255',
                'cover' => 'sometimes|image|max:2048',
                'body' => 'sometimes',
                'published_at' => 'date',
                'category_id' => 'sometimes',
                'author_id' => 'sometimes'
            ];

            if ($request->slug != $book->slug) {
                $rules['slug'] = 'sometimes|unique:books';
            }
        
            $validatedData = $request->validate($rules);

            if ($request->hasFile('cover')) {
                if ($book->cover && Storage::disk('public')->exists($book->cover)) {
                    Storage::disk('public')->delete($book->cover);
                }

                $validatedData['cover'] = $request->file('cover')->store('book-covers', 'public');
            }

            $book->update($validatedData);

            return response()->json([
                'message' => 'Buku berhasil di update!',
                'data' => $book
            ], 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $book = Book::find($id);

        if (!$book) {
            return response()->json(['message' => 'Book not found!'], 404);
        } else {
            if ($book->cover && Storage::disk('public')->exists($book->cover)) {
                Storage::disk('public')->delete($book->cover);
            }

            $book->destroy($id);

            return response()->json(['message' => 'Book is deleted successfully!'], 200);
        }
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required|min:3',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            if ($user->role !== 'admin') {
                Auth::logout();
                return response()->json(['message' => 'Hanya admin yang bisa login'], 403);
            }

            $token = $user->createToken('apitoken')->plainTextToken;

            return response()->json([
                'token' => $token
            ]);
        }

        return response()->json([
            'message' => 'Login failed!'
        ], 401);
    }

    public function bookByStatus(string $status)
    {
        $books = Book::where('status', $status)->get();

        if ($books->count()){
            return response()->json([
                'message' => 'Books with status : ' . $status,
                'data' => $books
            ], 200);
        } else {
            return response()->json(['message' => 'No books found with status : ' . $status], 404);
        }
    }

    public function search(string $search)
    {
        $books = Book::where('name', 'like', '%' . $search . '%')
        ->orWhere('body', 'like', '%' . $search . '%')->get();

        if ($books->count()){
            return response()->json([
                'message' => 'Books with name : ' . $search,
                'data' => $books
            ], 200);
        } else {
            return response()->json(['message' => 'No books found with name : ' . $search], 404);
        }
    }
}
