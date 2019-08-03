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
                <th scope="col">action</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($books as $item)

            <tr>

                <th scope="row">{{$loop->iteration}}</th>
                <td> <a href="{{route('book.form.edit', ['id'=> $item->id])}}">{{$item->name}} <a /></td>
                <td>{{$item->price}}</td>
                <td>{{$item->amount}}</td>
                <td><a href="{{route('book.update', ['id'=> $item->id, 'action' => 'add' ])}}"
                        class="btn btn-primary">Add</a>
                    <a href="{{route('book.update', ['id'=> $item->id, 'action' => 'remove' ])}}"
                        class="btn btn-danger">Remove</a>
                </td>

            </tr>

            @endforeach

        </tbody>
    </table>
</div>
@endsection