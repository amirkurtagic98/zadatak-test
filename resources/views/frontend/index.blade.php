@extends('layouts.front')

@section('title')
    Welcome to Book Club
@endsection

@section('content')
    @include('layouts.inc.slider')

    <div class="px-5 py-5">
        <div class="container"></div>
            <div class="row">
                <h2>Featured Books</h2>
                <div class="owl-carousel featured-carousel owl-theme">
                    @foreach($featured_books as $book)
                    <div class="item">
                        <a href="{{ url('books/'.$book->slug) }}">
                            <div class="card">
                                <img src="{{ asset('assets/uploads/book/'.$book->image) }}" alt="Book image">
                                <div class="card-body">
                                    <h5>{{ $book->name }}</h5>
                                    <span class="float-start">{{ $book->author }}</span>
                                    <span class="float-end">{{ $book->published }}</span>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach 
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function(){
            $('.featured-carousel').owlCarousel({
                loop:true,
                margin:10,
                nav:true,
                dots:false,
                responsive:{
                    0:{
                        items:1
                    },
                    600:{
                        items:3
                    },
                    1000:{
                        items:4
                    }
                }
            });
        });  
        
    </script>
@endsection