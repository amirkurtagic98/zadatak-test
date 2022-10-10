@extends('layouts.front')

@section('title')
    My Profile
@endsection

@section('content')
    <div class="container py-2">
        <div class="card shadow profileitems">
            @if($user->books->count() > 0)
                <div class="card-body">
                    @foreach($user->books as $book)
                        <div class="row book_data">
                            <div class="col-md-2 my-auto mt-2">
                                <img src="{{ asset('assets/uploads/book/'.$book->image) }}" height="70px" width="70px" alt="Image here">
                            </div>
                            <div class="col-md-3 my-auto mt-4">
                                <h6>{{ $book->name }}</h6>
                            </div>
                            <div class="col-md-3 my-auto mt-4">
                                <h6>{{ $book->author }}</h6>
                            </div>
                            <div class="col-md-2 my-auto mt-4">
                                <h6>{{ $book->published }}</h6>
                            </div>
                            <div class="col-md-2 my-auto mt-4">
                                <h6>{{ $book->pivot->created_at->format('d/m/Y') }}</h6>
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
                                            <option value="" disabled selected hidden>-- Pick a month --</option>
                                            <option value="1" {{ request()->has('month') && request()->input('month') == '1' ? 'selected' : '' }}>January</option>
                                            <option value="2" {{ request()->has('month') && request()->input('month') == '2' ? 'selected' : '' }}>February</option>
                                            <option value="3" {{ request()->has('month') && request()->input('month') == '3' ? 'selected' : '' }}>March</option>
                                            <option value="4" {{ request()->has('month') && request()->input('month') == '4' ? 'selected' : '' }}>April</option>
                                            <option value="5" {{ request()->has('month') && request()->input('month') == '5' ? 'selected' : '' }}>May</option>
                                            <option value="6" {{ request()->has('month') && request()->input('month') == '6' ? 'selected' : '' }}>June</option>
                                            <option value="7" {{ request()->has('month') && request()->input('month') == '7' ? 'selected' : '' }}>July</option>
                                            <option value="8" {{ request()->has('month') && request()->input('month') == '8' ? 'selected' : '' }}>August</option>
                                            <option value="9" {{ request()->has('month') && request()->input('month') == '9' ? 'selected' : '' }}>September</option>
                                            <option value="10" {{ request()->has('month') && request()->input('month') == '10' ? 'selected' : '' }}>October</option>
                                            <option value="11" {{ request()->has('month') && request()->input('month') == '11' ? 'selected' : '' }}>November</option>
                                            <option value="12" {{ request()->has('month') && request()->input('month') == '12' ? 'selected' : '' }}>December</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <button type="submit" class="btn btn-primary">Filter by Month</button>
                                </div>
                                <div class="col-md-6">
                                    <a href="{{ url('profile') }}" class="btn btn-success float-end">Back</a>
                                </div>
                            </div>
                        </form>
                    </h6>
                </div>
            @else
                <div class="card-body text-center">
                    <h2>No <i class="fa fa-book"></i> on your profile!</h2>
                </div>
                <div class="card-footer">
                    <h6>
                        <form action="{{ url('profile') }}" method="GET">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <select name="month" class="form-control">
                                            <option value="" disabled selected>--Pick a month--</option>
                                            <option value="1" {{ request()->has('month') && request()->input('month') == '1' ? 'selected' : '' }}>January</option>
                                            <option value="2" {{ request()->has('month') && request()->input('month') == '2' ? 'selected' : '' }}>February</option>
                                            <option value="3" {{ request()->has('month') && request()->input('month') == '3' ? 'selected' : '' }}>March</option>
                                            <option value="4" {{ request()->has('month') && request()->input('month') == '4' ? 'selected' : '' }}>April</option>
                                            <option value="5" {{ request()->has('month') && request()->input('month') == '5' ? 'selected' : '' }}>May</option>
                                            <option value="6" {{ request()->has('month') && request()->input('month') == '6' ? 'selected' : '' }}>June</option>
                                            <option value="7" {{ request()->has('month') && request()->input('month') == '7' ? 'selected' : '' }}>July</option>
                                            <option value="8" {{ request()->has('month') && request()->input('month') == '8' ? 'selected' : '' }}>August</option>
                                            <option value="9" {{ request()->has('month') && request()->input('month') == '9' ? 'selected' : '' }}>September</option>
                                            <option value="10" {{ request()->has('month') && request()->input('month') == '10' ? 'selected' : '' }}>October</option>
                                            <option value="11" {{ request()->has('month') && request()->input('month') == '11' ? 'selected' : '' }}>November</option>
                                            <option value="12" {{ request()->has('month') && request()->input('month') == '12' ? 'selected' : '' }}>December</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <button type="submit" class="btn btn-primary">Filter by Month</button>
                                </div>
                                <div class="col-md-6">
                                    <a href="{{ url('profile') }}" class="btn btn-success float-end">Back</a>
                                </div>
                            </div>
                        </form>
                    </h6>
                </div>
            @endif
        </div>
    </div>
@endsection