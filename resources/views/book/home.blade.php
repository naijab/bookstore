@extends('layout.app')

@section('title', 'All')

@section('content')
<div class="container mt-5">
    <a href="{{route('book.form.add')}}" class="btn btn-success mb-5">Add New Book</a>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">name</th>
                <th scope="col">price</th>
                <th scope="col">amount</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($books as $item)
            <tr>
                <th scope="row">{{$item->id}}</th>
                <td>{{$item->name}}</td>
                <td>{{$item->price}}</td>
                <td>{{$item->amount}}</td>
            </tr>
            @endforeach

        </tbody>
    </table>
</div>
@endsection