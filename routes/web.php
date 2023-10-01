<?php

use Illuminate\Support\Facades\Route;
use App\Book;
use App\Http\Controllers\Books;

Route::get('/', function () {
    $books = Book::all();
    return view('layout.main', ['books' => $books]);
});

Route::get('/add-books', function () {
    return view('layout.add_books');
});

Route::post('/', [Books::class, 'store'])->name('books.store');

Route::get('/', [Books::class, 'index'])->name('books.index');
Route::get('/edit-books/{isbn}', [Books::class, 'edit'])->name('edit_books');

Route::put('/update-books/{isbn}', [Books::class, 'update'])->name('update_books');
Route::delete('/delete-books/{isbn}', [Books::class, 'destroy'])->name('delete_books');



