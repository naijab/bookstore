<?php

namespace App\Http\Controllers;

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

        \App\BookStore::create($validator->validate());
        return redirect()->route('book.home');
    }

}
