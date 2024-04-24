<nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
    <div class="container px-4 px-lg-5">
        <a class="navbar-brand" href="#page-top">{{ __('People Oriented Development') }}</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
            aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ms-auto my-2 my-lg-0">

                @if (Route::is('guest.index'))
                    <li class="nav-item"><a class="nav-link" href="#about">{{ __('About') }}</a></li>
                    <li class="nav-item"><a class="nav-link" href="#services">{{ __('Services') }}</a></li>
                    <li class="nav-item"><a class="nav-link" href="#portfolio">{{ __('Portfolio') }}</a></li>
                @endif

                @if (Route::is('guest.project'))
                    <li class="nav-item"><a class="nav-link" href="{{ route('guest.index') }}">{{ __('Go Back') }}</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="#summary">{{ __('Summary') }}</a></li>
                    <li class="nav-item"><a class="nav-link" href="#map">{{ __('Map') }}</a></li>
                    <li class="nav-item"><a class="nav-link" href="#logo">{{ __('Logo') }}</a></li>
                    <li class="nav-item"><a class="nav-link" href="#portfolio">{{ __('Portfolio') }}</a></li>
                @endif
                <li class="nav-item"><a class="nav-link" href="#contact">{{ __('Contact') }}</a></li>

                @if (count(config('app.languages')) > 1)
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ strtoupper(app()->getLocale()) }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            @foreach (config('app.languages') as $langLocale => $langName)
                                <a class="dropdown-item"
                                    href="{{ url()->current() }}?change_language={{ $langLocale }}">{{ strtoupper($langLocale) }}
                                    ({{ $langName }})
                                </a>
                            @endforeach
                        </div>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
