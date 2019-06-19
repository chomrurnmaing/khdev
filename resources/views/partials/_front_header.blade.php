<header class="{!! Request::is('/') ? 'home-header' : 'header' !!}">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand" href="#">
                <img src="/frontend/images/logo.png" height="35px" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('front.homepage') }}">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item {{ Request::is('solutions') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('front.solutions.index') }}">Solutions</a>
                    </li>
                    <li class="nav-item {{ Request::is('portfolios') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('front.portfolios.index') }}">Portfolio</a>
                    </li>
                    <li class="nav-item {{ Request::is('about-us') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('front.about-us') }}">About Us</a>
                    </li>
                    <li class="nav-item {{ Request::is('contact-us') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('front.contact-us') }}">Contact Us</a>
                    </li>
                    <li class="nav-item {{ Request::is('contact-us') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('front.contact-us') }}">Announcement</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</header>