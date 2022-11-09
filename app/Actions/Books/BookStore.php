<?php

namespace App\Actions\Books;

use App\Models\Book;

class BookStore {

    public function execute($request): Book
    {
        $book = Book::create([
            'title'=>$request->title,
            'user_id'=> auth()->id(),
            'page'=> $request->page,
            'amount'=> $request->amount
        ]);

        return $book;
    }

}