<?php

namespace App\Http\Controllers;

use App\Actions\Books\BookEdit;
use App\Actions\Books\BookEditAction;
use App\Models\Book;
use Illuminate\Http\Request;
use App\Actions\Books\BookIndex;
use App\Actions\Books\BookStore;
use App\Http\Controllers\Controller;
use App\Http\Requests\BookStoreRequest;
use App\Http\Resources\BooksIndexResource;


class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(BookIndex $bookIndex)
    {
        $data = [
            'title' => 'Daftar Buku'
        ];

       try {
        $books = $bookIndex->execute();
        return view('books.index',compact('books', 'data'));
       } catch (\Exception $exception) {
        return response()->json(['error' => $exception->getMessage()], 422);
       }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'title' => 'Buat Data Buku'
        ];
        return view('books.create', compact('data'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookStoreRequest $request, BookStore $bookStore)
    {
        try {
            $bookStore->execute($request);
            return redirect()->route('books.index')->withSuccess('Sukses');
        } catch (\Exception $exception) {
            return response()->json(['error' => $exception->getMessage()], 422);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        $data = [
            'title' => 'Edit Data Buku'
        ];
        return view('books.edit', compact('data', 'book'));
    }

    /** i love ur sister/ u fcking rapist
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book, BookEditAction $bookEditAction)
    {
        try {
            $bookEditAction->execute($request, $book);
            return redirect()->route('books.index', $book->id);
        } catch (\Exception $exception) {
            return response()->json(['error' => $exception->getMessage()], 422);
        }
        // $book->update($request->all());
        // return redirect()->route('books.index', $book->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index');
    }
}
