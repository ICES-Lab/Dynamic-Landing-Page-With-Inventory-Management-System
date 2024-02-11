<header class="nav">
    <div class="nav__holder nav--sticky">
        <div class="container-fluid nav__container nav__container--side-padding">
            <div class="flex-parent">

                <div class="nav__header">
                    <!-- Logo -->
                    <a href="/" class="logo-container flex-child">
                        <img class="logo" src="{{asset('storage/Main/'.$data->logo)}}" alt="logo">
                    </a>

                    <!-- Mobile toggle -->
                    <button type="button" class="nav__icon-toggle" id="nav__icon-toggle" data-toggle="collapse" data-target="#navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="nav__icon-toggle-bar"></span>
                        <span class="nav__icon-toggle-bar"></span>
                        <span class="nav__icon-toggle-bar"></span>
                    </button>
                </div>

                <!-- Navbar -->
                <nav id="navbar-collapse" class="nav__wrap collapse navbar-collapse">
                    <ul class="nav__menu">
                        <li class="nav__dropdown">
                            <a href="/" aria-haspopup="true">Home</a>
                        </li>
                        @foreach ($header as $head)
                        <li class="nav__dropdown">
                            <a href="{{$head->slug}}" aria-haspopup="true">{{$head->name}}</a>
                        </li>
                        @endforeach
                    </ul> <!-- end menu -->
                    <div class="nav__phone nav__phone--mobile d-lg-none">
                        <span class="nav__phone-text">Contact us:</span>
                    </div>

                    <div class="nav__socials nav__socials--mobile d-lg-none">
                        <div class="socials">
                        @foreach ($contacts as $contact)
                            <a href="{{ ($contact->type ? $contact->type : ''). $contact->contact}}" class="social" target="{{ $contact->target }}"><i class="{{ $contact->icon_code }}"></i></a>
                        @endforeach
                        </div>
                    </div>
                </nav> <!-- end nav-wrap -->

                <div class="nav__phone nav--align-right d-none d-lg-block">
                    <span class="nav__phone-text">Contact us:</span>
                </div>

                <div class="nav__socials d-none d-lg-block">
                    <div class="socials">
                        @foreach ($contacts as $contact)
                            <a href="{{ ($contact->type ? $contact->type : ''). $contact->contact}}" class="social" target="{{ $contact->target }}"><i class="{{ $contact->icon_code }}"></i></a>
                        @endforeach
                    </div>
                </div>

            </div> <!-- end flex-parent -->
        </div> <!-- end container -->

    </div>
</header>