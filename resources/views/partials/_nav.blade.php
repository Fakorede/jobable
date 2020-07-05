<nav class="navbar navbar-expand-lg fixed-top scrolling-navbar">
        <div class="container">
                <div class="theme-header clearfix">
        
                <div class="navbar-header">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-navbar" aria-controls="main-navbar" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                        <span class="lni-menu"></span>
                        <span class="lni-menu"></span>
                        <span class="lni-menu"></span>
                        </button>

                        <a href="/" class="navbar-brand">
                            <strong> Job<span style="color: #000">Able</span> </strong>
                        </a>
                </div>

                <div class="collapse navbar-collapse" id="main-navbar">

                    <ul class="navbar-nav mr-auto w-100 justify-content-end">

                        @guest
                            
                            <li class="nav-item">
                            <a class="nav-link" href="/employer/register">Register as Employer</a>
                            </li>

                            <li class="nav-item">
                                    <a class="nav-link" href="/register">Register as Job seeker</a>
                            </li>

                            <li class="button-group">
                            <a href="/login" class="button btn btn-common">Post a Job</a>
                            </li>

                        @else

                        @if (Auth::user()->user_type == 'employer')
                                <li class="button-group">
                                    <a href="{{ route('jobs.create') }}" class="button btn btn-common">
                                        {{ __('Post a Job') }}
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('myjobs') }}">{{ __('My Jobs') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('applications') }}">{{ __('Applications') }}</a>
                                </li>
                            @else
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('jobs.index') }}">{{ __('Available Jobs') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('home') }}">{{ __('Saved Jobs') }}</a>
                                </li>
                            @endif
                            
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>

                                    @if (Auth::user()->user_type == 'employer')
                                        {{ Auth::user()->company->cname }}
                                    @else
                                        {{ Auth::user()->name }}
                                    @endif

                                    <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    @if (Auth::user()->user_type == 'employer')
                                        <a class="dropdown-item" href="{{ route('company.show') }}"
                                        >
                                            {{ __('Company') }}
                                        </a>
                                    @else
                                        <a class="dropdown-item" href="{{ route('profile.index') }}"
                                        >
                                            {{ __('Profile') }}
                                        </a>
                                    @endif

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>

                        @endguest



                    </ul>
        
                </div>
</div>
        </div>

</nav>