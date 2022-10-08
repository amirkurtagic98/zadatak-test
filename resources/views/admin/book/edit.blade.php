@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Edit/Update Book</h4>
        </div>
        <div class="card-body">
            <form action="{{ url('update-books/'.$book->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="">Name</label>
                        <input type="text" value="{{ $book->name }}" class="form-control" name="name">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Slug</label>
                        <input type="text" value="{{ $book->slug }}" class="form-control" name="slug">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Published</label>
                        <input type="text" value="{{ $book->published }}" class="form-control" name="published">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Author</label>
                        <input type="text" value="{{ $book->author }}" class="form-control" name="author">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Description</label>
                        <textarea name="description" rows="3" class="form-control">{{ $book->description }}</textarea>
                    </div>
                    @if($book->image)
                        <img src="{{ asset('assets/uploads/book/'.$book->image) }}" alt="Book image">
                    @endif
                    <div class="col-md-12">
                        <input type="file" class="form-control" name="image">
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection