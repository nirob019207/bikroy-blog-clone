@extends('frontend.home')
@section('content')

<section class="container bg-white shadow-lg s" >
    <div class="container-fluid bg-white shadow-lg p-4">
        <div class="row">
            <!-- Main Content Section: Takes 9 columns on medium and larger screens, full width on small screens -->
            <main class="col-md-9 col-12 py-5" >
                <div class="row position-relative">
                    <div class="col">
                        <div class="tab-content position-relative ">
                            <!-- Display Specific Category Name -->
                            <div class="mt-5" style="margin-top:40px">
    <h5 class="bg-head px-2 p-1 rounded-lg text-white mt-5" style="display: inline-block;"> 
        {{ $singleblog->category->name ?? 'Category' }} <!-- Access the category name correctly -->
    </h5>
</div>

                            <div class="row flex-column">
                                <h1 class="my-4 "> {{$singleblog->title}}</h1>

                                <div>
                                <img src="{{ asset('storage/' . $singleblog->image) }}" alt="Blog Image" class="mb-3 mb-md-0 w-100 h-15">
                                </div>




                                <div>
                                <div class="my-5 ">{!! $singleblog->long_description !!}</div> <!-- Render HTML content safely -->                                </div>






                                <div class="mt-5">
                                    <h5>Leave a Comment:</h5>
                                    <div class="fb-comments" 
                                         data-href="{{ url()->current() }}" 
                                         data-width="100%" 
                                         data-numposts="5" 
                                         data-colorscheme="light"></div>
                                </div>

                                <div class="mt-5 pt-5">
                                    <h5>Related Posts</h5>
                                    <div class="row flex-column">
                                        <!-- Responsive Horizontal Blog Layout for Related Posts -->
                                        @foreach($relatedblogs as $related)
                                            <div class="d-flex flex-column flex-md-row align-items-center mb-3">
                                                <img src="{{ asset('storage/' . $related->image) }}" alt="Related Blog Image" class="mb-3 mb-md-0 recent-image">
                                                <div>
                                                    <h5>{{ $related->title }}</h5>
                                                    <p>{{ $related->short_description }}</p>
                                                    <a href="{{ route('singleblog', $related->id) }}" class="btn btn-light">Learn More</a>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                               
                            </div>
                        </div>
                    </div>
                </div>
            </main>

            <!-- Sidebar Section: Takes 3 columns on medium and larger screens, full width on small screens -->
            <aside class="col-md-3 col-12 bg-light py-5" id="left">
                <div class="mb-3 sticky-top" id="side">
                    <div class="bg-head p-2 text-center text-white" style="background-color: #343a40;">
                        Categories
                    </div>
                    <ul class="nav flex-column justify-content-between text-black" id="sidenav">
                        <!-- Sidebar Links for All Categories -->
                        @foreach($categories as $cat)
                            <li class="nav-item">
                                <a href="{{ route('categoryblog', $cat->id) }}" class="nav-link pl-0 text-black">
                                    {{ $cat->name }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </aside>
        </div>
    </div>
</section>

@endsection
