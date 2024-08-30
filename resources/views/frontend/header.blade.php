<div class="bg-head d-none d-lg-block">
    <div class="container-fluid d-flex justify-content-between align-items-center">
    <a href="{{url('/')}}"> 
        <div class="px-5 py-2">
                       <img src="{{ asset('frontend/assets/bikroylogo.PNG') }}" alt="Logo">
         
        </div>
        </a>   
        <div class="px-5 py-4">
            <button class="head-btn px-4 py-1 border-0 rounded-3 text-white">Post Your Ad</button>
        </div>
    </div>
</div>

<div class="sticky-lg-top fixed-top bg-head">
    <nav class="navbar navbar-expand-lg bg-head2 py-3">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center">
                <div class="px-2 py-2 d-block d-lg-none">
                    <img src="{{ asset('frontend/assets/bikroylogo.PNG') }}" style="width: 100px;" alt="Logo">
                </div>
                <ul class="navbar-nav d-flex flex-row gap-3 align-items-center d-none d-lg-flex">
                    @foreach ($categories->take(4) as $category)
                        <li class="nav-item">
                            <a class="nav-link text-light" href="{{ route('categoryblog', $category->id) }}">{{ $category->name }}</a>
                        </li>
                    @endforeach
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-light" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            More
                        </a>
                        <!-- Refined Dropdown -->
                        <ul class="dropdown-menu custom-dropdown-menu">
                            @foreach ($categories->skip(4) as $category)
                                <li>
                                    <a class="dropdown-item" href="{{ route('categoryblog', $category->id) }}">{{ $category->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                </ul>
            </div>
            <div>
                <ul class="navbar-nav d-block d-lg-none">
                    <li>
                        <a href="javascript:void(0)" class="closebtn text-white" onclick="openSidebar()">
                            <i class="fas fa-bars"></i>
                        </a>
                    </li>
                </ul>
                <ul class="navbar-nav flex-row gap-2 align-items-center text-white d-none d-lg-flex">
                    <li><i class="fas fa-user"></i> Follow</li>
                    <li>
                        <div class="position-relative">
                            <input type="text" class="border-0 bg-transparent text-white" placeholder="Search" onfocus="this.classList.remove('text-white')" onblur="this.classList.add('text-white')">
                            <i class="fas fa-search position-absolute top-50 end-0 translate-middle-y text-white"></i>
                            <i class="fas fa-times position-absolute top-50 end-0 translate-middle-y text-white d-none" id="closeIcon" onclick="clearSearch()"></i>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>

<div id="mySidebar" class="sidebar">
    <a href="javascript:void(0)" class="closebtn text-white" onclick="closeSidebar()"><i class="fas fa-times"></i></a>
    <ul class="navbar-nav flex-column align-items-start mt-5 pt-5 mx-5">
        @foreach ($categories->take(4) as $category)
            <li class="nav-item">
                <a class="nav-link text-light" href="{{ route('categoryblog', $category->id) }}">{{ $category->name }}</a>
            </li>
        @endforeach
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-light" href="#" role="button" data-bs-toggle="dropdown">
                More
            </a>
            <ul class="dropdown-menu custom-dropdown-menu">
                @foreach ($categories->skip(4) as $category)
                    <li>
                        <a class="dropdown-item text-black" href="{{ route('categoryblog', $category->id) }}">{{ $category->name }}</a>
                    </li>
                @endforeach
            </ul>
        </li>
    </ul>
</div>



