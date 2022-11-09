<?php

namespace App\Actions\Books;

use App\Models\Book;

class BookEditAction {

   public function execute($request, Book $book): bool
   {
      return $book->update([
         'title'=>$request->title,
         'page'=>$request->page,
         'amount'=>$request->amount
      ]);
   }
}