<?php

namespace App\Actions\Books;

use App\Models\Book;
use Illuminate\Contracts\Pagination\Paginator;

class BookIndex {

    public function execute(): Paginator
    {
        $books = Book::with('user')->paginate(5);
        return $books;
    }
}