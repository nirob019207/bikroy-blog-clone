@extends('frontend.home')
@section('content')

<section class=" bg-white shadow-md single-main">
    <div class="container-fluid">
        <div class="row">
            <!-- Main Content Section: Takes 9 columns on medium and larger screens, full width on small screens -->
            <main class="col-md-9 col-12 py-5">
                <div class="row position-relative">
                    <div class="col">
                        <div class="tab-content position-relative">
                            <!-- Display Specific Category Name -->
                            <div class="bg-head p-2 mb-4 text-white mt-5">
                                {{ $category->name ?? 'Category' }}
                            </div>
                            <div class="row flex-column">
                                <!-- Responsive Horizontal Blog Layout -->
                                @foreach($categoryBlog as $blog)
                                    <div class="d-flex flex-column flex-md-row bg-white p-3 shadow-sm align-items-center mb-3">
                                        <img src="{{ asset('storage/' . $blog->image) }}" alt="Blog Image" class="mb-3 mb-md-0 recent-image" >
                                        <div>
                                            <h5>{{ $blog->title }}</h5>
                                            <p>{{ $blog->short_description }}</p>
                                            <a   href="{{ route('singleblog', $blog->id) }}" class="bg-white btn text-black shadow-xl px-1">Learn More</a>
                                            </div>
                                    </div>
                                @endforeach
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
