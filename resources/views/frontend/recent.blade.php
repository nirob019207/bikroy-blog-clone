@extends('frontend.home')
@section('content')

@include('frontend.hero')

<section class="shadow-lg container bg-white" >
    <div>
        <div class=" position-relative" id="content">
            <div class="row h-100 ">
                <main class="col-md-9 py-5">
                    <div class="row position-relative">
                        <div class="col">
                            <div class="tab-content  position-relative">
                                <!-- Recent Blog Section -->
                                <div class="bg-head p-2 mb-4  text-white ">Recent Blogs</div>
                                <div class="row flex-column">
                                    <!-- Responsive Horizontal Blog Layout -->
                                    @foreach($recents as $recent)
    <div class="d-flex flex-column flex-md-row align-items-center bg-white px-3 py-1 shadow-lg text-black mb-3">
        <img src="{{ asset('storage/' . $recent->image) }}" alt="Blog Image" class="mb-3 mb-md-0 recent-image">
        <div>
            <h5>{{ $recent->title }}</h5>
            <p>{{ $recent->short_description }}</p>
            <a href="{{ route('singleblog', $recent->id) }}" class="btn bg-white shadow-xl text-black">Learn More</a>
        </div>
    </div>
@endforeach


                                  
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
                <!-- Sidebar Section -->
                <aside class="col-md-3 bg-light" id="left">
                    <div class="mt-5 mb-3 sticky-top" id="side">
                        <div class="bg-head p-2 text-center text-white" style="background-color: #343a40;">
                            Categories
                        </div>
                        <ul class="nav flex-column  justify-content-between text-black" id="sidenav">
                            @foreach($categories as $category)
                            <li class="nav-item">
                                <a href="{{ route('categoryblog', $category->id) }}" class="nav-link pl-0 text-black">{{$category->name}}</a>
                            </li>

                            @endforeach
                            <!-- Sidebar Links -->
                           
                            
                        </ul>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</section>

@endsection
