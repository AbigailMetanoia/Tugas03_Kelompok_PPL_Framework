<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Book;

class Books extends Controller
{
    public function index()
    {
        $books = Book::all(); // Mengambil semua data pelanggan
        return view('layout.main', ['books' => $books]);
    }

    public function store(Request $request)
    {
        // Validasi dan simpan data pelanggan baru
        $validatedData = $request->validate([
            'isbn' => 'required|string|max:13',
            'author' => 'required|string|max:50',
            'title' => 'required|string|max:100',
            'price' => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/',
        ]);

        $books = new Book;
        $books->isbn = $request->input('isbn');
        $books->author = $request->input('author');
        $books->title = $request->input('title');
        $books->price = $request->input('price');
        $books->save();

        return redirect('/')->with('success', 'Pelanggan berhasil ditambahkan.');
    }

    public function destroy(Request $request)
    {
        $isbn = $request->input('isbn');

        if ($isbn) {
            // Temukan model pelanggan berdasarkan isbn
            $books = Book::find($isbn);

            if ($books) {
                // Hapus pelanggan
                $books->delete();
                return redirect()->back()->with('success', 'book deleted successfully');
            } else {
                return redirect()->back()->with('error', 'book not found');
            }
        } else {
            return redirect()->back()->with('error', 'Invalid book ID');
        }
    }

    public function edit($isbn)
    {
        // Mengambil data pelanggan berdasarkan isbn
        $books = Book::find($isbn);

        if (!$books) {
            // Tampilkan pesan jika pelanggan tidak ditemukan
            return redirect()->route('books.index')->with('error', 'book not found');
        }

        return view('layout.edit_books', ['books' => $books, 'isbn' => $isbn]);
    }

    public function update(Request $request, $isbn)
    {
        // Validasi data yang diterima dari formulir
        $validatedData = $request->validate([
            'author' => 'required|string|max:50',
            'title' => 'required|string|max:100',
            'price' => 'required|numeric',
        ]);

        $books = Book::where('isbn', $isbn)->first();

        if (!$books) {
            return redirect()->route('books.index')->with('error', 'Buku tidak ditemukan');
        }

        $books->author = $request->input('author');
        $books->title = $request->input('title');
        $books->price = $request->input('price');
        $books->save();

        return redirect()->route('books.index')->with('success', 'Buku berhasil diperbarui');
    }

}
