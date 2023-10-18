@extends('crmlayout.guestlayout.layout')
@section('guestcontent')
<style>
    /* Insert the above CSS rules here */
    /* Make the portfolio boxes square */
    .portfolio-box {
        width: 100%;
        /* Take full width of the container */
        height: 0;
        /* Reset the height */
        padding-bottom: 100%;
        /* This makes the height equal to the width, forming a square */
        position: relative;
        /* Position relative to allow the inner content to be absolutely positioned */
    }

    /* Adjust the images */
    .portfolio-box img.img-fluid {
        position: absolute;
        /* Absolute position within the portfolio box */
        top: 0;
        left: 0;
        width: 100%;
        /* Force width to 100% of the container */
        height: 100%;
        /* Force height to 100% of the container */
        object-fit: cover;
        /* Cover the container while maintaining aspect ratio */
        transition: transform 0.3s ease;
        /* Smooth transition for hover effect */
    }

    /* Hover effect */
    .portfolio-box:hover img.img-fluid {
        transform: scale(1.05);
        /* Zoom in effect on hover */
    }

    /* Adjust the caption */
    .portfolio-box .portfolio-box-caption {
        position: absolute;
        /* Absolute position within the portfolio box */
        top: 0;
        left: 0;
        width: 100%;
        /* Take full width */
        height: 100%;
        /* Take full height */
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
    }

    /* Spacing between portfolio items */
    .col-lg-4.col-sm-6 {
        padding: 15px;
    }
</style>
<header class="masthead">
    <div class="container px-4 px-lg-5 h-100">
        <div class="row gx-4 gx-lg-5 h-100 align-items-center justify-content-center text-center">
            <div class="col-lg-8 align-self-end">
                <h1 class="text-white font-weight-bold">WE ARE P.O.D</h1>
                <hr class="divider" />
            </div>
            <div class="col-lg-8 align-self-baseline">
                <p class="text-white-75 mb-5">Real Estate Development Coming Near You!</p>
                <a class="btn btn-primary btn-xl" href="#about">Find Out More</a>
            </div>
        </div>
    </div>
</header>
<!-- About-->
<section class="page-section bg-primary" id="about">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-lg-8 text-center">
                <h2 class="text-white mt-0">We've got what you need!</h2>
                <hr class="divider divider-light" />
                <p class="text-white-75 mb-4 h5">POD Real Estate Development strives at being the best at offering cost
                    effective, low-carbon footprint developments that become "go-to" places for everyday living,
                    shopping and retailing. Our company's focus is to deliver "POD" (People Oriented Development)
                    projects that best respond to our customer needs and market conditions.</p>
                <a class="btn btn-light btn-xl" href="#services">Get Started!</a>
            </div>
        </div>
    </div>
</section>
<!-- Services-->
<section class="page-section" id="services">
    <div class="container px-4 px-lg-5">
        <h2 class="text-center mt-0">At Your Service</h2>
        <hr class="divider" />
        <div class="row gx-4 gx-lg-5">
            <div class="col-lg-3 col-md-6 text-center">
                <div class="mt-5">
                    <div class="mb-2"><i class="bi-gem fs-1 text-primary"></i></div>
                    <h3 class="h4 mb-2">Mission</h3>
                    <p class="text-muted mb-0">Mission Here!</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 text-center">
                <div class="mt-5">
                    <div class="mb-2"><i class="bi-laptop fs-1 text-primary"></i></div>
                    <h3 class="h4 mb-2">Vision</h3>
                    <p class="text-muted mb-0">Vision Here</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 text-center">
                <div class="mt-5">
                    <div class="mb-2"><i class="bi-globe fs-1 text-primary"></i></div>
                    <h3 class="h4 mb-2">Mission</h3>
                    <p class="text-muted mb-0">Mission Here!</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 text-center">
                <div class="mt-5">
                    <div class="mb-2"><i class="bi-heart fs-1 text-primary"></i></div>
                    <h3 class="h4 mb-2">Vision</h3>
                    <p class="text-muted mb-0">Vision Here</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Portfolio-->
<div id="portfolio">
    <section class="page-section bg-primary" id="">
        <h2 class="text-center mt-0 text-white">Our Project Portfolio</h2>
        <hr class="divider divider-light" />
        <div class="container-fluid p-0">

            <div class="row g-0">
                @forelse ($projects as $project)
                <div class="col-lg-4 col-sm-6">
                    <a class="portfolio-box" href="{{ route('guest.project',$project->id) }}" title="Project Name">
                        <img class="img-fluid" src="{{ asset($project->logo_path) }}" alt="..." />
                        <div class="portfolio-box-caption">
                           
                            <div class="project-name">{{ $project->project_name }}</div>
                            <div class="project-category text-white-50">{{ $project->project_description }}</div>
                        </div>
                    </a>
                </div>

                @empty
                No Projects Here!
                @endforelse
                {{-- <div class="col-lg-4 col-sm-6">
                    <a class="portfolio-box" href="assets/img/portfolio/fullsize/2.jpg" title="Project Name">
                        <img class="img-fluid" src="assets/img/portfolio/thumbnails/2.jpg" alt="..." />
                        <div class="portfolio-box-caption">
                            <div class="project-category text-white-50">Category</div>
                            <div class="project-name">Project Name</div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a class="portfolio-box" href="assets/img/portfolio/fullsize/3.jpg" title="Project Name">
                        <img class="img-fluid" src="assets/img/portfolio/thumbnails/3.jpg" alt="..." />
                        <div class="portfolio-box-caption">
                            <div class="project-category text-white-50">Category</div>
                            <div class="project-name">Project Name</div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a class="portfolio-box" href="assets/img/portfolio/fullsize/4.jpg" title="Project Name">
                        <img class="img-fluid" src="assets/img/portfolio/thumbnails/4.jpg" alt="..." />
                        <div class="portfolio-box-caption">
                            <div class="project-category text-white-50">Category</div>
                            <div class="project-name">Project Name</div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a class="portfolio-box" href="assets/img/portfolio/fullsize/5.jpg" title="Project Name">
                        <img class="img-fluid" src="assets/img/portfolio/thumbnails/5.jpg" alt="..." />
                        <div class="portfolio-box-caption">
                            <div class="project-category text-white-50">Category</div>
                            <div class="project-name">Project Name</div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a class="portfolio-box" href="assets/img/portfolio/fullsize/6.jpg" title="Project Name">
                        <img class="img-fluid" src="assets/img/portfolio/thumbnails/6.jpg" alt="..." />
                        <div class="portfolio-box-caption p-3">
                            <div class="project-category text-white-50">Category</div>
                            <div class="project-name">Project Name</div>
                        </div>
                    </a>
                </div> --}}
            </div>
        </div>
    </section>
</div>
@endsection