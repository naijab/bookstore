<?php

namespace App\Http\Controllers;

use App\BookStore;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;

class BookController extends Controller
{
    public function index()
    {
        $books = \App\BookStore::all();
        $data['books'] = $books;
        return view('book.home', $data);
    }

    public function addForm()
    {
        return view('book.add');
    }

    public function editForm($id)
    {
        $book = BookStore::find($id);
        $data['book'] = $book;
        return view('book.edit', $data);
    }

    public function addBook(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'price' => 'required|numeric',
            'amount' => 'required|numeric',
        ], [
            'name.required' => 'name is required',
            'price.required' => 'price is required',
            'amount.required' => 'amount is required',
            'price.numeric' => 'price is number only',
            'amount.numeric' => 'amount is number only',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }

        BookStore::create($validator->validate());
        return redirect()->route('book.home');
    }

    public function updateBook(Request $request, $id, $action)
    {
        $book = BookStore::find($id);
        if ($action == "add") {
            $book->amount = $book->amount + 1;
        } else if ($action == "remove") {
            if ($book->amount > 0) {
                $book->amount = $book->amount - 1;
            }
        }
        $book->save();
        return redirect()->back();
    }

    public function updateBookById(Request $request, $id)
    {
        $book = BookStore::find($id);

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'price' => 'required|numeric',
            'amount' => 'required|numeric',
        ], [
            'name.required' => 'name is required',
            'price.required' => 'price is required',
            'amount.required' => 'amount is required',
            'price.numeric' => 'price is number only',
            'amount.numeric' => 'amount is number only',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }

        $book->fill($validator->validate());
        $book->save();

        return redirect()->back();
    }

}
