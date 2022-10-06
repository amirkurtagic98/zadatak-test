@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Edit/Update Book</h4>
        </div>
        <div class="card-body">
            <form action="{{ url('update-books/'.$book->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="">Name</label>
                        <input type="text" value="{{ $book->name }}" class="form-control" name="name">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Published</label>
                        <input type="text" value="{{ $book->published }}" class="form-control" name="published">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Author</label>
                        <input type="text" value="{{ $book->author }}" class="form-control" name="author">
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection