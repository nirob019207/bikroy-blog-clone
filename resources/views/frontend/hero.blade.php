
<section class="hero-section">
        <div class="row row-custom">
            <!-- Big Photo Column -->
            <div class="col-md-6 col-12">
                <div class="bigc shadow-lg cardd">
                <img src="{{ asset('storage/' . $latestThree[0]->image) }}" alt="{{ $latestThree[0]->title }}" class="big-photo py-2">
                    <div class="intro1 container-fluid">
                    <h3 class="text-white">{{ $latestThree[0]->title }}</h3>
                    <p>{{ Str::limit($latestThree[0]->short_description, 100) }}</p>
                    </div>
                </div>
            </div>
            <!-- Small Photos Column -->
            <div class="col-md-6 col-12 d-flex cardd flex-md-column flex-row">
            @foreach ($latestThree->slice(1, 2) as $post)

                <div class="smallc position-relative">
                <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="small-photo1 py-2">
                <div class="intro2">
                    <h3 class="text-white">{{ $latestThree[0]->title }}</h3>
                    <p>{{ Str::limit($latestThree[0]->short_description, 100) }}</p>
                    </div>
                </div>
                @endforeach
              
            </div>
        </div>
    </section>