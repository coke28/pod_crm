@extends('guestlayout.layout')
@section('guestcontent')
    @php
        use Illuminate\Support\Str;
    @endphp

    <header class="masthead">
        <div class="container px-4 px-lg-5 h-100">
            <div class="row gx-4 gx-lg-5 h-100 align-items-center justify-content-center text-center">
                <div class="col-lg-8 align-self-end">
                    <h1 class="text-white font-weight-bold">{{ __('We Are P.O.D.') }}</h1>
                    <hr class="divider" />
                </div>
                <div class="col-lg-8 align-self-baseline">
                    <p class="text-white-75 mb-5">{{ $project->project_name }}</p>
                </div>
            </div>
        </div>
    </header>
    <section class="page-section bg-primary" id="summary">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-lg-8 text-center">
                    <h2 class="text-white mt-0">{{ __('Project Summary') }}</h2>
                    <hr class="divider divider-light" />
                    <p class="text-white-75 mb-4">{{ $project->project_description }}</p>
                </div>
            </div>
        </div>
    </section>
    <section class="page-section" id="map">
        <div class="container px-4 px-lg-5">
            <h2 class="text-center mt-0">{{ __('Map') }}</h2>
            <hr class="divider" />
            <div class="map d-flex justify-content-center">
                <!-- Embed your map here -->
                <img src="{{ asset($project->map_path) }}" alt="Project Logo" class="img-fluid"
                    style="max-width: 100%; height: auto;" />
            </div>
        </div>

    </section>
    <section class="page-section bg-primary" id="logo">
        <div class="container px-4 px-lg-5 text-center">
            <h2 class="text-center mt-0">{{ __('Logo') }}</h2>
            <hr class="divider" />
            <div class="map" style="display: flex; justify-content: center;">
                <img src="{{ asset($project->logo_path) }}" alt="Project Logo" class="img-fluid"
                    style="max-width: 100%; height: auto;" />
            </div>
        </div>
    </section>
    <section class="page-section" id="portfolio">
        <div class="container px-4 px-lg-5">
            <h2 class="text-center mt-0">{{ __('Project Portfolio') }}</h2>
            <hr class="divider" />

            <!-- Tabs navigation -->
            <ul class="nav nav-tabs" id="categoryTabs" role="tablist">
                @foreach ($categories as $index => $category)
                    <li class="nav-item" role="presentation">
                        <a class="nav-link {{ $index == 0 ? 'active' : '' }}"
                            id="tab-{{ Str::slug($category->category_name) }}" data-bs-toggle="tab"
                            href="#content-{{ Str::slug($category->category_name) }}" role="tab"
                            aria-controls="content-{{ Str::slug($category->category_name) }}"
                            aria-selected="{{ $index == 0 ? 'true' : 'false' }}">{{ $category->category_name }}</a>
                    </li>
                @endforeach
            </ul>

            <!-- Tabs content -->
            <div class="tab-content" id="categoryTabsContent">
                @foreach ($categories as $index => $category)
                    <div class="tab-pane fade {{ $index == 0 ? 'show active' : '' }}"
                        id="content-{{ Str::slug($category->category_name) }}" role="tabpanel"
                        aria-labelledby="tab-{{ Str::slug($category->category_name) }}">

                        <!-- Grid of images for each Category -->
                        <div class="row">
                            @forelse ($images->where('category_id', $category->id) as $image)
                                <div class="col-md-4">
                                    <img src="{{ asset($image->image_path) }}" alt="{{ $category->category_name }}"
                                        class="img-fluid" />
                                </div>
                            @empty
                                <div class="col">
                                    {{ __('No Images Found') }}
                                </div>
                            @endforelse
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
