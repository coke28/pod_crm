@extends('guestlayout.layout')
@section('guestcontent')

<header class="masthead">
    <div class="container px-4 px-lg-5 h-100">
        <div class="row gx-4 gx-lg-5 h-100 align-items-center justify-content-center text-center">
            <div class="col-lg-8 align-self-end">
                <h1 class="text-white font-weight-bold">WE ARE P.O.D</h1>
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
                <h2 class="text-white mt-0">Project Summary</h2>
                <hr class="divider divider-light" />
                <p class="text-white-75 mb-4">{{ $project->project_description }}</p>
            </div>
        </div>
    </div>
</section>
<section class="page-section" id="map">
    <div class="container px-4 px-lg-5">
        <h2 class="text-center mt-0">Map</h2>
        <hr class="divider" />
        <div class="map">
            <!-- Embed your map here -->
            <img src="{{ asset($project->map_path) }}" alt="Project Logo" class="img-fluid" />
        </div>
    </div>
</section>
<section class="page-section bg-primary" id="logo">
    <div class="container px-4 px-lg-5 text-center">
        <h2 class="text-center mt-0">Logo</h2>
        <hr class="divider" />
        <div class="map">
            <img src="{{ asset($project->logo_path) }}" alt="Project Logo" class="img-fluid" />
        </div>
    </div>
</section>
<section class="page-section" id="portfolio">
    <div class="container px-4 px-lg-5">
        <h2 class="text-center mt-0">Project Portfolio</h2>
        <hr class="divider" />

        <!-- Tabs navigation -->
        <ul class="nav nav-tabs" id="categoryTabs" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active" id="tab1-tab" data-bs-toggle="tab" href="#tab1" role="tab"
                    aria-controls="tab1" aria-selected="true">Category 1</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="tab2-tab" data-bs-toggle="tab" href="#tab2" role="tab" aria-controls="tab2"
                    aria-selected="false">Category 2</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="tab3-tab" data-bs-toggle="tab" href="#tab3" role="tab" aria-controls="tab3"
                    aria-selected="false">Category 3</a>
            </li>
        </ul>

        <!-- Tabs content -->
        <div class="tab-content" id="categoryTabsContent">
            <div class="tab-pane fade show active" id="tab1" role="tabpanel" aria-labelledby="tab1-tab">
                <!-- Grid of images for Category 1 -->
                <div class="row">
                    <!-- Repeat this block for each image -->
                    <div class="col-md-4">
                        {{-- <img src="" alt="Image 1" class="img-fluid" /> --}}
                    </div>
                    <!-- End block -->
                </div>
            </div>
            <div class="tab-pane fade" id="tab2" role="tabpanel" aria-labelledby="tab2-tab">
                <!-- Grid of images for Category 2 -->
                <!-- Follow the same structure as Category 1 -->
            </div>
            <div class="tab-pane fade" id="tab3" role="tabpanel" aria-labelledby="tab3-tab">
                <!-- Grid of images for Category 3 -->
                <!-- Follow the same structure as Category 1 -->
            </div>
        </div>
    </div>
</section>




@endsection