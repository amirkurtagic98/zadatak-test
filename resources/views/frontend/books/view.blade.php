@extends('layouts.front')

@section('title', $books->name)

@section('content')
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ url('/add-rating') }}" method="POST">
                    @csrf
                    <input type="hidden" name="book_id" value="{{ $books->id }}">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Rate {{ $books->name }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="rating-css">
                            <div class="star-icon">
                                @if($user_rating)
                                    @for($i = 1; $i <= $user_rating->stars_rated; $i++)
                                        <input type="radio" value="{{ $i }}" name="book_rating" checked id="rating{{$i}}">
                                        <label for="rating{{$i}}" class="fa fa-star"></label>
                                    @endfor
                                    @for($j = $user_rating->stars_rated + 1; $j <= 5; $j++)
                                        <input type="radio" value="{{ $j }}" name="book_rating" id="rating{{$j}}">
                                        <label for="rating{{$j}}" class="fa fa-star"></label>
                                    @endfor     
                                @else
                                    <input type="radio" value="1" name="book_rating" checked id="rating1">
                                    <label for="rating1" class="fa fa-star"></label>
                                    <input type="radio" value="2" name="book_rating" id="rating2">
                                    <label for="rating2" class="fa fa-star"></label>
                                    <input type="radio" value="3" name="book_rating" id="rating3">
                                    <label for="rating3" class="fa fa-star"></label>
                                    <input type="radio" value="4" name="book_rating" id="rating4">
                                    <label for="rating4" class="fa fa-star"></label>
                                    <input type="radio" value="5" name="book_rating" id="rating5">
                                    <label for="rating5" class="fa fa-star"></label>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="container py-5">
        <div class="card shadow book_data">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 border-right">
                        <img src="{{ asset('assets/uploads/book/'.$books->image) }}" class="w-100" alt="">
                    </div>
                    <div class="col-md-8">
                        <h2 class="mb-0">
                            {{ $books->name }}
                        </h2>

                        <hr>
                        <label class="me-3"><b>Author:</b> {{ $books->author }}</label>
                        <label class="me-3"><b>Published:</b> {{ $books->published }}</label>
                        @php $ratenum = number_format($rating_value) @endphp
                        <div class="rating">
                            @for($i = 1; $i <= $ratenum; $i++)
                                <i class="fa fa-star checked"></i>
                            @endfor
                            @for($j = $ratenum + 1; $j <= 5; $j++)
                                <i class="fa fa-star"></i>
                            @endfor
                            <span>
                                @if($ratings->count() > 0)
                                    {{ $ratings->count() }} Ratings
                                @else
                                    No Ratings
                                @endif
                            </span>
                        </div>
                        <p class="mt-3">
                            {!! $books->description !!}
                        </p>

                        <div class="row mt-2">
                            <div class="col-md-9">
                                <form method="POST" action="{{ route('add-to-profile') }}" id="addBookProfile">
                                    @csrf
                                    <input type="hidden" value="{{ $books->id }}" name="book_id">
                                    <br>
                                
                                    <button type="button" class="btn btn-primary me-3 addToProfileBtn float-start">Add to Profile <i class="fa fa-book"></i></button>
                                </form>
                                
                            </div>
                        </div>
                    </div>

                    <div class="py-2">
                        <hr>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <button type="button" class="btn btn-link" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Rate this book
                        </button>
                        <a href="{{ url('add-review/'.$books->slug.'/userreview') }}" class="btn btn-link">
                            Write a review
                        </a>
                    </div>
                    <div class="col-md-8">
                        @foreach($reviews as $item)
                        <div class="user-review">
                            <label for="">{{ $item->user->name }}</label>
                            @if($item->user_id == Auth::id())
                                <a href="{{ url('edit-review/'.$books->slug.'/userreview') }}" class="ms-5">Edit</a>
                            @endif
                            <br>
                            @php 
                                $rating = App\Models\Rating::where('book_id', $books->id)->where('user_id', $item->user->id)->first();
                            @endphp
                            @if($rating)
                                @php $user_rated = $rating->stars_rated; @endphp
                                @for($i = 1; $i <= $user_rated; $i++)
                                    <i class="fa fa-star checked"></i>
                                @endfor
                                @for($j = $user_rated + 1; $j <= 5; $j++)
                                    <i class="fa fa-star"></i>
                                @endfor
                            @endif
                            <small>Reviewed on {{ $item->created_at->format('d M Y') }}</small>
                            <p>
                                {{ $item->user_review }}
                            </p>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
