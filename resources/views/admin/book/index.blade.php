@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Book Page</h4>
            <hr>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Published</th>
                        <th>Author</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody> 
                    @foreach($books as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->published }}</td>
                        <td>{{ $item->author }}</td>
                        <td>
                            <a href="{{ url('edit-books/'.$item->id) }}" class="btn btn-primary">Edit</a>
                            <a href="{{ url('delete-books/'.$item->id) }}" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
@endsection