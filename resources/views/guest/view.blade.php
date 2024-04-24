@extends('guestlayout.layout')
@section('guestcontent')
    <header class="masthead">
        <div class="container px-4 px-lg-5 h-100">
            <div class="row gx-4 gx-lg-5 h-100 align-items-center justify-content-center text-center">
                <div class="col-lg-8 align-self-end">
                    <h1 class="text-white font-weight-bold">{{ __('We Are P.O.D.') }}</h1>
                    <hr class="divider" />
                </div>
                <div class="col-lg-8 align-self-baseline">
                    <p class="text-white-75 mb-5">{{ __('Real Estate Development Coming Near You!') }}</p>
                    <a class="btn btn-primary btn-xl" href="#about">{{ __('Find out more') }}</a>
                </div>
            </div>
        </div>
    </header>
    <!-- About-->
    <section class="page-section bg-primary" id="about">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-lg-8 text-center">
                    <h2 class="text-white mt-0">{{ __('We have got what you need!') }}</h2>
                    <hr class="divider divider-light" />
                    <p class="text-white-75 mb-4 h5">
                        {{ __("POD Real Estate Development strives at being the best at offering cost effective, low-carbon footprint developments that become go-to places for everyday living, shopping and retailing. Our company's focus is to deliver POD (People Oriented Development) projects that best respond to our customer needs and market conditions.") }}
                    </p>
                    <a class="btn btn-light btn-xl" href="#services">{{ __('Get Started!') }}</a>
                </div>
            </div>
        </div>
    </section>
    <!-- Services-->
    <section class="page-section" id="services">
        <div class="container px-4 px-lg-5">
            <h2 class="text-center mt-0">{{ __('At Your Service') }}</h2>
            <hr class="divider" />
            <div class="row gx-4 gx-lg-5">
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="mt-5">
                        <div class="mb-2"><i class="bi-gem fs-1 text-primary"></i></div>
                        <h3 class="h4 mb-2">{{ __('Mission') }}</h3>
                        <p class="text-muted mb-0">{{ __('Mission Here!') }}</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="mt-5">
                        <div class="mb-2"><i class="bi-laptop fs-1 text-primary"></i></div>
                        <h3 class="h4 mb-2">{{ __('Vision') }}</h3>
                        <p class="text-muted mb-0">{{ __('Vision Here!') }}</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="mt-5">
                        <div class="mb-2"><i class="bi-globe fs-1 text-primary"></i></div>
                        <h3 class="h4 mb-2">{{ __('Mission') }}</h3>
                        <p class="text-muted mb-0">{{ __('Mission Here!') }}</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="mt-5">
                        <div class="mb-2"><i class="bi-heart fs-1 text-primary"></i></div>
                        <h3 class="h4 mb-2">{{ __('Vision') }}</h3>
                        <p class="text-muted mb-0">{{ __('Vision Here!') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Portfolio-->
    <div id="portfolio">
        <section class="page-section bg-primary" id="">
            <h2 class="text-center mt-0 text-white">{{ __('Our Project Portfolio') }}</h2>
            <hr class="divider divider-light" />
            <div class="container-fluid p-0">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 g-0">
                    @forelse ($projects as $project)
                        <div class="col">
                            <a class="portfolio-box" href="{{ route('guest.project', $project->id) }}" title="Project Name">
                                <img class="img-fluid" src="{{ asset($project->logo_path) }}" alt="Project Image" />
                                <div class="portfolio-box-caption">
                                    <div class="project-name">{{ $project->project_name }}</div>
                                    <div class="project-category text-white-50">{{ $project->project_description }}</div>
                                </div>
                            </a>
                        </div>
                    @empty
                        <div class="col">
                            {{ __('No Projects Here!') }}
                        </div>
                    @endforelse
                </div>
            </div>

    </div>
@endsection
