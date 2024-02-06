@extends('layouts.main')
@section('title','Home')
@push('internalCss')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
</style>
@endpush
@push('bodycontent')
<div class="rev-offset"></div>
    <!-- Revolution Slider -->
    <div class="rev_slider_wrapper">
        <div class="rev_slider" id="slider-1" data-version="5.0">
            <ul>
                <!-- SLIDE 1 -->
                <li data-fstransition="fade"
                    data-transition="fade"
                    data-easein="default"
                    data-easeout="default"
                    data-slotamount="1"
                    data-masterspeed="1200"
                    data-delay="8000"
                    data-title="Modern Living Room"
                    >
                    <!-- MAIN IMAGE -->
                    <img src="img/revolution/home-1/1.jpg"
                        alt=""
                        data-bgrepeat="no-repeat"
                        data-bgfit="cover"
                        data-bgparallax="7"
                        class="rev-slidebg"
                        >

                    <!-- HERO TITLE -->
                    <div class="tp-caption hero-text"
                        data-x="30"
                        data-y="center"
                        data-voffset="[-140,-120,-100,-180]"
                        data-fontsize="[72,62,52,46]"
                        data-lineheight="[72,62,52,46]"
                        data-width="[none, none, none, 300]"
                        data-whitespace="[nowrap, nowrap, nowrap, normal]"
                        data-frames='[{
                            "delay":1000,
                            "speed":900,
                            "frame":"0",
                            "from":"y:150px;opacity:0;",
                            "ease":"Power3.easeOut",
                            "to":"o:1;"
                            },{
                            "delay":"wait",
                            "speed":1000,
                            "frame":"999",
                            "to":"opacity:0;","ease":"Power3.easeOut"
                        }]'
                        data-splitout="none">Modern Living Room<span class="hero-dot">.</span>
                    </div>

                    <!-- HERO SUBTITLE -->
                    <div class="tp-caption small-text"
                        data-x="30"
                        data-y="center"
                        data-voffset="[-40,-30,-20,0]"
                        data-fontsize="[21,21,21,21]"
                        data-lineheight="34"
                        data-width="[none, none, none, 300]"
                        data-whitespace="[nowrap, nowrap, nowrap, normal]"
                        data-frames='[{
                            "delay":1100,
                            "speed":900,
                            "frame":"0",
                            "from":"y:150px;opacity:0;",
                            "ease":"Power3.easeOut",
                            "to":"o:1;"
                            },{
                            "delay":"wait",
                            "speed":1000,
                            "frame":"999",
                            "to":"opacity:0;","ease":"Power3.easeOut"
                        }]'
                        >The Sedona Theatre is Ireland's largest fixed-seat theatre.<br>It's located in Grand Canal Square, Dublin.
                    </div>

                    <!-- BUTTON -->
                    <div class="tp-caption"
                            data-x="30"
                            data-y="center"
                            data-voffset="[60,60,60,100]"
                            data-lineheight="55"
                            data-hoffset="0"
                            data-frames='[{
                                "delay":1200,
                                "speed":900,
                                "frame":"0",
                                "from":"y:150px;opacity:0;",
                                "ease":"Power3.easeOut",
                                "to":"o:1;"
                                },{
                                "delay":"wait",
                                "speed":1000,
                                "frame":"999",
                                "to":"opacity:0;","ease":"Power3.easeOut"
                            }]'
                            ><a href='#' class='btn btn--lg btn--color'>View Acheivement</a>
                    </div>

                </li> <!-- end slide 1 -->

                <!-- SLIDE 2 -->
                <li data-fstransition="fade"
                    data-transition="fade"
                    data-easein="default"
                    data-easeout="default"
                    data-slotamount="1"
                    data-masterspeed="1200"
                    data-delay="8000"
                    data-title="Astralian Museum"
                    >
                    <!-- MAIN IMAGE -->
                    <img src="img/revolution/home-1/2.jpg"
                        alt=""
                        data-bgrepeat="no-repeat"
                        data-bgfit="cover"
                        data-bgparallax="7"
                        class="rev-slidebg"
                        >

                    <!-- HERO TITLE -->
                    <div class="tp-caption hero-text"
                        data-x="30"
                        data-y="center"
                        data-voffset="[-140,-120,-100,-180]"
                        data-fontsize="[72,62,52,46]"
                        data-lineheight="[72,62,52,46]"
                        data-width="[none, none, none, 300]"
                        data-whitespace="[nowrap, nowrap, nowrap, normal]"
                        data-frames='[{
                            "delay":1000,
                            "speed":900,
                            "frame":"0",
                            "from":"y:150px;opacity:0;",
                            "ease":"Power3.easeOut",
                            "to":"o:1;"
                            },{
                            "delay":"wait",
                            "speed":1000,
                            "frame":"999",
                            "to":"opacity:0;","ease":"Power3.easeOut"
                        }]'
                        data-splitout="none">Astralian Museum<span class="hero-dot">.</span>
                    </div>

                    <!-- HERO SUBTITLE -->
                    <div class="tp-caption small-text"
                        data-x="30"
                        data-y="center"
                        data-voffset="[-40,-30,-20,0]"
                        data-fontsize="[21,21,21,21]"
                        data-lineheight="34"
                        data-width="[none, none, none, 300]"
                        data-whitespace="[nowrap, nowrap, nowrap, normal]"
                        data-frames='[{
                            "delay":1100,
                            "speed":900,
                            "frame":"0",
                            "from":"y:150px;opacity:0;",
                            "ease":"Power3.easeOut",
                            "to":"o:1;"
                            },{
                            "delay":"wait",
                            "speed":1000,
                            "frame":"999",
                            "to":"opacity:0;","ease":"Power3.easeOut"
                        }]'
                        >The Sedona Theatre is Ireland's largest fixed-seat theatre.<br>It's located in Grand Canal Square, Dublin.
                    </div>

                    <!-- BUTTON -->
                    <div class="tp-caption"
                            data-x="30"
                            data-y="center"
                            data-voffset="[60,60,60,100]"
                            data-lineheight="55"
                            data-hoffset="0"
                            data-frames='[{
                                "delay":1200,
                                "speed":900,
                                "frame":"0",
                                "from":"y:150px;opacity:0;",
                                "ease":"Power3.easeOut",
                                "to":"o:1;"
                                },{
                                "delay":"wait",
                                "speed":1000,
                                "frame":"999",
                                "to":"opacity:0;","ease":"Power3.easeOut"
                            }]'
                            ><a href='#' class='btn btn--lg btn--color'>View Acheivement</a>
                    </div>

                </li> <!-- end slide 1 -->

                <!-- SLIDE 3 -->
                <li data-fstransition="fade"
                    data-transition="fade"
                    data-easein="default"
                    data-easeout="default"
                    data-slotamount="1"
                    data-masterspeed="1200"
                    data-delay="8000"
                    data-title="Horizon Urban"
                    >
                    <!-- MAIN IMAGE -->
                    <img src="img/revolution/home-1/3.jpg"
                        alt=""
                        data-bgrepeat="no-repeat"
                        data-bgfit="cover"
                        data-bgparallax="7"
                        class="rev-slidebg"
                        >

                    <!-- HERO TITLE -->
                    <div class="tp-caption hero-text"
                        data-x="30"
                        data-y="center"
                        data-voffset="[-140,-120,-100,-180]"
                        data-fontsize="[72,62,52,46]"
                        data-lineheight="[72,62,52,46]"
                        data-width="[none, none, none, 300]"
                        data-whitespace="[nowrap, nowrap, nowrap, normal]"
                        data-frames='[{
                            "delay":1000,
                            "speed":900,
                            "frame":"0",
                            "from":"y:150px;opacity:0;",
                            "ease":"Power3.easeOut",
                            "to":"o:1;"
                            },{
                            "delay":"wait",
                            "speed":1000,
                            "frame":"999",
                            "to":"opacity:0;","ease":"Power3.easeOut"
                        }]'
                        data-splitout="none">Horizon Urban<span class="hero-dot">.</span>
                    </div>

                    <!-- HERO SUBTITLE -->
                    <div class="tp-caption small-text"
                        data-x="30"
                        data-y="center"
                        data-voffset="[-40,-30,-20,0]"
                        data-fontsize="[21,21,21,21]"
                        data-lineheight="34"
                        data-width="[none, none, none, 300]"
                        data-whitespace="[nowrap, nowrap, nowrap, normal]"
                        data-frames='[{
                            "delay":1100,
                            "speed":900,
                            "frame":"0",
                            "from":"y:150px;opacity:0;",
                            "ease":"Power3.easeOut",
                            "to":"o:1;"
                            },{
                            "delay":"wait",
                            "speed":1000,
                            "frame":"999",
                            "to":"opacity:0;","ease":"Power3.easeOut"
                        }]'
                        >The Sedona Theatre is Ireland's largest fixed-seat theatre.<br>It's located in Grand Canal Square, Dublin.
                    </div>

                    <!-- BUTTON -->
                    <div class="tp-caption"
                            data-x="30"
                            data-y="center"
                            data-voffset="[60,60,60,100]"
                            data-lineheight="55"
                            data-hoffset="0"
                            data-frames='[{
                                "delay":1200,
                                "speed":900,
                                "frame":"0",
                                "from":"y:150px;opacity:0;",
                                "ease":"Power3.easeOut",
                                "to":"o:1;"
                                },{
                                "delay":"wait",
                                "speed":1000,
                                "frame":"999",
                                "to":"opacity:0;","ease":"Power3.easeOut"
                            }]'
                            ><a href='#' class='btn btn--lg btn--color'>View Acheivement</a>
                    </div>

                </li> <!-- end slide 1 -->

            </ul>
        </div>
    </div>

    <!-- What We Do -->
    <section class="section-wrap intro pb-40">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <h2 class="intro__title">What We Do</h2>
                    <p>We support the students, faculty, and researchers to develop their own products in the domain of wireless communication and Embedded Systems networks by motivating them to participate in National and International level events.</p>
                    <p>We are deeply engaged in providing a pleasant platform for students to enrich their knowledge in the field of wireless communications and pioneering the students to file patents for their own ideas.</p>
                    <div class="row mb-lg-48">
                        
                        <div class="col-sm-6">
                            <div class="feature">
                                <i class="fa fa-wifi feature__icon" style="font-size:3.1rem"></i>
                                <h4 class="feature__title">Wireless Communication</h4>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="feature">
                                <i class="fa fa-microchip feature__icon" style="font-size:3.1rem"></i>
                                <h4 class="feature__title">Embedded Systems</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <img src="img/intro/2.jpg" class="img-full-width" alt="">
                </div>
            </div>
        </div>
    </section> <!-- end What We Do -->


    <!-- products -->
    <section class="section-wrap pt-72 pb-72 pb-lg-40">
        <div class="container">
            <div class="title-row">
                <h2 class="section-title">Recent Projects</h2>
            </div>					

            <!-- Filter -->
            <!-- <div class="masonry-filter">
                <a href="#" class="filter active" data-filter="*">All</a>
                <a href="#" class="filter" data-filter=".residential">Residential</a>
                <a href="#" class="filter" data-filter=".commercial">Commercial</a>
                <a href="#" class="filter" data-filter=".interior">Interior</a>
                <a href="#" class="filter" data-filter=".landscape">Landscape</a>
            </div> 
            end filter -->

            <div class="row masonry-grid">           
                <div class="masonry-item col-lg-4 project hover-trigger residential">
                    <div class="project__container">
                        <div class="project__img-holder">
                            <a href="portfolio-single.html">
                                <img src="img/portfolio/masonry/1.jpg" alt="" class="project__img">
                                <div class="hover-overlay">
                                    <div class="project__description">
                                        <h3 class="project__title">Keangnam Grand Hall</h3>
                                        <span class="project__date">2018</span>
                                    </div>
                                </div>
                            </a>              
                        </div>                  
                    </div> 
                </div> <!-- end product 1 -->

                <div class="masonry-item col-lg-4 project hover-trigger commercial">
                    <div class="project__container">
                        <div class="project__img-holder">
                            <a href="portfolio-single.html">
                                <img src="img/portfolio/masonry/2.jpg" alt="" class="project__img">
                                <div class="hover-overlay">
                                    <div class="project__description">
                                        <h3 class="project__title">Green House</h3>
                                        <span class="project__date">2018</span>
                                    </div>
                                </div>
                            </a>              
                        </div>                  
                    </div> 
                </div> <!-- end product 2 -->

                <div class="masonry-item col-lg-4 project hover-trigger interior">
                    <div class="project__container">
                        <div class="project__img-holder">
                            <a href="portfolio-single.html">
                                <img src="img/portfolio/masonry/3.jpg" alt="" class="project__img">
                                <div class="hover-overlay">
                                    <div class="project__description">
                                        <h3 class="project__title">Contemporary Villa</h3>
                                        <span class="project__date">2018</span>
                                    </div>
                                </div>
                            </a>              
                        </div>                  
                    </div> 
                </div> <!-- end product 3 -->

                <div class="masonry-item col-lg-4 project hover-trigger landscape">
                    <div class="project__container">
                        <div class="project__img-holder">
                            <a href="portfolio-single.html">
                                <img src="img/portfolio/masonry/4.jpg" alt="" class="project__img">
                                <div class="hover-overlay">
                                    <div class="project__description">
                                        <h3 class="project__title">Business Office</h3>
                                        <span class="project__date">2018</span>
                                    </div>
                                </div>
                            </a>              
                        </div>                  
                    </div> 
                </div> <!-- end product 4 -->

            </div>
        </div>
    </section> <!-- end products -->


    <!-- Testimonials -->
    

    <!-- collaborators -->
    <div class="partners bg-light text-center">
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <a href="#">
                        <img src="img/partners/11.png" alt="">
                    </a>
                </div>
                <div class="col-sm-3">
                    <a href="#">
                        <img src="img/partners/12.png" alt="">
                    </a>
                </div>
                <div class="col-sm-3">
                    <a href="#">
                        <img src="img/partners/13.png" alt="">
                    </a>
                </div>
                <div class="col-sm-3">
                    <a href="#">
                        <img src="img/partners/14.png" alt="">
                    </a>
                </div>
            </div>
        </div>
    </div>
@endpush
@push('javascript')
<script>
</script>
@endpush