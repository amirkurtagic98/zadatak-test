@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Registered Users</h4>
            <hr>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>@sortablelink('name')</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>@sortablelink('created_at')</th>
                    </tr>
                </thead>
                <tbody> 
                    @if($users->count())
                        @foreach($users as $key => $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->role_as == '0' ? 'User' : 'Admin' }}</td>
                            <td>{{ $item->created_at->format('d/m/Y') }}</td>
                        </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
            {!! $users->appends(\Request::except('page'))->render() !!}
        </div>
    </div>
@endsection