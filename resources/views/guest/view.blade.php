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
            </div>
        </div>
</div>
@endsection