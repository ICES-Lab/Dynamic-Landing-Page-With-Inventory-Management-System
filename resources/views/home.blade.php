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
                @foreach($slides as $slider)
                <li data-fstransition="fade"
                    data-transition="fade"
                    data-easein="default"
                    data-easeout="default"
                    data-slotamount="1"
                    data-masterspeed="1200"
                    data-delay="8000"
                    data-title="{{$slider->name}}"
                    >
                    <!-- MAIN IMAGE -->
                    <img src="{{asset('storage/SubPages/'.$slider->active_img)}}"
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
                        data-splitout="none">{{$slider->name}}<span class="hero-dot">.</span>
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
                        >{!! $slider->content !!}
                    </div>
                </li>
                @endforeach <!-- end slide 1 -->
            </ul>
        </div>
    </div>

    <!-- What We Do -->
    <section class="section-wrap intro pb-40">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <h2 class="intro__title">What We Do</h2>
                    <p>{!! $data->what_we_do !!}</p>
                    <div class="row mb-lg-48">
                        
                        <div class="col-sm-6">
                            <div class="feature">
                                <i class="{{$data->icon1_code}} feature__icon" style="font-size:3.1rem"></i>
                                <h4 class="feature__title">{{$data->icon1_name}}</h4>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="feature">
                                <i class="{{$data->icon2_code}} feature__icon" style="font-size:3.1rem"></i>
                                <h4 class="feature__title">{{$data->icon2_name}}</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <img src="{{asset('storage/'.$data->what_we_do_pic)}}" class="img-full-width" alt="">
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
                @foreach($in_home as $value)
                <div class="masonry-item col-lg-4 project hover-trigger residential">
                    <div class="project__container">
                        <div class="project__img-holder">
                            <a href="{{ route('subpage', ['main_slug' => $value->main, 'sub_slug' => $value->slug]) }}">
                                <img src="{{asset('storage/SubPages/'.$value->active_img)}}" alt="{{$value->slug}}" class="project__img">
                                <div class="hover-overlay">
                                    <div class="project__description">
                                        <h3 class="project__title">{{$value->name}}</h3>
                                        <span class="project__date">{{$value->detail}}</span>
                                    </div>
                                </div>
                            </a>              
                        </div>                  
                    </div> 
                </div>
                @endforeach
            </div>
        </div>
    </section> <!-- end products -->


    <!-- Testimonials -->
    

    <!-- collaborators -->
    <div class="partners bg-light text-center">
        <div class="container">
            <div class="row">
                @foreach($in_foot as $value)
                <div class="col-sm-3">
                    <a href="{{ route('subpage', ['main_slug' => $value->main, 'sub_slug' => $value->slug]) }}">
                        <img src="{{asset('storage/SubPages/'.$value->active_img)}}" alt="{{$value->slug}}">
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endpush
@push('javascript')
<script>
</script>
@endpush