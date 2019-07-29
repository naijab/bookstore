@extends('layout.app')

@section('title', 'Add new Book')

@section('content')
<div class="container mt-5">
    <div class="row d-flex justify-content-center">
        <div class="col-md-6">
            <h1>Add new Book</h1>

            <form action="{{route('book.add')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label>Book Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Enter book name">

                    @if ($errors->has('name'))
                    <div class="alert alert-danger">
                        <strong>{{ $errors->first('name') }}</strong>
                    </div>
                    @endif

                </div>
                <div class="form-group">
                    <label>Book Price</label>
                    <input type="text" class="form-control" name="price" placeholder="Enter price">

                    @if ($errors->has('price'))
                    <div class="alert alert-danger">
                        <strong>{{ $errors->first('price') }}</strong>
                    </div>
                    @endif

                </div>
                <div class="form-group">
                    <label>Book Amount</label>
                    <input type="text" class="form-control" name="amount" placeholder="Enter amount">

                    @if ($errors->has('amount'))
                    <div class="alert alert-danger">
                        <strong>{{ $errors->first('amount') }}</strong>
                    </div>
                    @endif


                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection