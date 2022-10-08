@extends('layouts.front')

@section('title')
    My Profile
@endsection

@section('content')
    <div class="container py-2">
        <div class="card shadow profileitems">
            @if($profileItems->count() > 0)
                <div class="card-body">
                    @foreach($profileItems as $item)
                        <div class="row book_data">
                            <div class="col-md-2 my-auto mt-2">
                                <img src="{{ asset('assets/uploads/book/'.$item->books->image) }}" height="70px" width="70px" alt="Image here">
                            </div>
                            <div class="col-md-3 my-auto mt-4">
                                <h6>{{ $item->books->name }}</h6>
                            </div>
                            <div class="col-md-3 my-auto mt-4">
                                <h6>{{ $item->books->author }}</h6>
                            </div>
                            <div class="col-md-2 my-auto mt-4">
                                <h6>{{ $item->books->published }}</h6>
                            </div>
                            <div class="col-md-2 my-auto mt-4">
                                <h6>{{ $item->created_at->format('d/m/Y') }}</h6>
                            </div>
                            <!--<div class="col-md-3 my-auto">
                                <input type="hidden" class="book_id" value="{{-- $item->book_id --}}">
                            </div>-->
                        </div>
                    @endforeach
                </div>
                <div class="card-footer">
                    <h6>
                        <form action="{{ url('profile') }}" method="GET">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        
                                        <select name="month" class="form-control">
                                            <option>Pick a month</option>
                                            <option value="1">January</option>
                                            <option value="2">February</option>
                                            <option value="3">March</option>
                                            <option value="4">April</option>
                                            <option value="5">May</option>
                                            <option value="6">June</option>
                                            <option value="7">July</option>
                                            <option value="8">August</option>
                                            <option value="9">September</option>
                                            <option value="10">October</option>
                                            <option value="11">November</option>
                                            <option value="12">December</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <button type="submit" class="btn btn-primary">Filter by Month</button>
                                </div>
                            </div>
                        </form>
                    </h6>
                </div>
            @else
                <div class="card-body text-center">
                    <h2>Your <i class="fa fa-user"></i> Profile is empty!</h2>
                    <a href="{{ url('/') }}" class="btn btn-outline-primary float-end">Continue Looking</a>
                </div>
            @endif
        </div>
    </div>
@endsection