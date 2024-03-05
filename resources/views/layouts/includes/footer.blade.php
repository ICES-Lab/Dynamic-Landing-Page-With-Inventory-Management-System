<footer class="footer bg-dark-overlay" style="background-image: url({{asset('storage/Main/footer.jpg')}});">
    <div class="container-fluid">
        <div class="footer__widgets">
            <div class="row">

                <div class="col-lg-3 col-md-3">
                    <div class="widget widget-about-us">
                        <!-- Logo -->
                        <a href="{{$data->link}}" class="logo-container flex-child">
                            <img class="logo" src="{{asset('storage/'.$data->logo)}}" alt="logo">
                        </a>
                    </div>
                </div> <!-- end logo -->

                <div class="col-lg-2 col-md-3">
                    <div class="widget widget_nav_menu">
                    <p style="font-size:large">Our Pages:</p>
                        <ul>
                            @foreach ($footer as $foot)
                            <li><a href="{{ route('mainpage', ['slug' => $foot->slug]) }}">{{$foot->name}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="col-lg-2 col-md-3">
                    <div class="widget widget_nav_menu">
                        <p style="font-size:large">Our Vision:</p>
                            <p>{{$data->vision}}</p>
                    </div>
                </div>

                <div class="col-lg-3 offset-lg-2 col-md-2">
                    <div class="widget">
                        <p style="font-size:large">Contact Us:</p>
                        <div class="socials">
                        @foreach ($contacts as $contact)
                            <a href="{{ ($contact->type ? $contact->type : ''). $contact->contact}}" class="social" target="{{ $contact->target }}"><i class="{{ $contact->icon_code }}"></i></a>
                        @endforeach
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div> <!-- end container -->
    <div class="footer__bottom">
        <div class="container-fluid text-right text-md-center">
            <span class="copyright">
                &copy; <script>document.querySelector(".copyright").innerHTML += new Date().getFullYear()</script> | Made by <a href="{{$data->link}}">{{$data->lab_name}}</a>
            </span>
        </div>
    </div>
</footer>