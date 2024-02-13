@extends('layouts.main')
@section('title','Home')
@push('internalCss')
<style>
    #imageInCentre{
        border-radius: 100%;
        border-width: 10px;
        border-color: red;
    }
</style>
@endpush
@push('bodycontent')
<!-- Page Title -->
<section class="page-title page-title--tall blog-featured-img bg-dark-overlay text-center" style="background-image: url({{asset('storage/Main/background.jpg)')}};">
    <div class="container">
        <div class="page-title__holder">
            <img id="imageInCentre" src="{{asset('storage/Incharges/'.$data->profile_img)}}">
            <h1 class="page-title__title">{{$data->name}}</h1>
            <ul class="entry__meta">
                <li class="entry__meta-date">
                    <span>{{$data->department}}</span>
                </li>
                <li class="entry__meta-author">
                    <span>{{$data->department}}</span>
                </li>
                <li class="entry__meta-category">
                    <a href="{{'mailto:'.$data->email}}">{{$data->email}}</a>
                </li>
            </ul>
        </div>
    </div>
</section> <!-- end page title -->

			<!-- Single Post -->
<section class="section-wrap pt-40 pb-48">
    
    <div class="box-offset-container">
        <div class="blog__content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                
                        <!-- Article -->
                        <article class="entry mb-0">
                            <div class="entry__article-wrap">
                        
                                <!-- Share -->
                                <div class="entry__share">
                                    <div class="sticky-col">
                                        <div class="socials socials--rounded socials--base">
                                            @foreach($data->social as $social)
                                            <a class="social" href="{{$social->link}}" title="facebook" target="_blank" aria-label="facebook">
                                                <img style="width:35px;" src="{{$social->icon_img}}" alt="">
                                            </a>
                                            @endforeach
                                        </div>
                                    </div>
                                </div> <!-- end share -->
                        
                                <div class="entry__article">

                                <aside class="col-xl-9">
                                <div class="Faculty-details-right">
    @foreach($data->top as $top)
    <div class="Faculty-details-right-box-1 Professional-Experience">
        <div class="row">
            <aside class="col-md-12">
                <div class="box-sec-top">
                    <div class="box-sec">
                        <aside class="">
                            <h3>{{$top->title}}</h3>
                        </aside>
                    </div>
                </div>
            </aside>
            <aside class="col-md-12 box-sec-bottom">
                <div class="table-responsive">
                    <table class="table table-responsive table-bordered table-hover">
                        <thead>
                            <tr>
                                @foreach($top->medium as $medium)
                                <th style="text-align: center;">{{$medium->title}}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($medium->bottom as $bottom)
                            <tr role="row" class="odd">
                                @foreach($top->medium as $medium)
                                <td>
                                    @foreach($medium->bottom as $bottom)
                                    {{$bottom->content}}<br>
                                    @endforeach
                                </td>
                                @endforeach
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </aside>
        </div>
    </div>
    @endforeach
</div>

                                </aside>
                                </div>
                                <!-- end entry article -->
                            </div>
                            <!-- end entry article wrap -->
                        </article>
                        
                        <!-- Related Posts -->
                        
                    </div>
                </div> 
            </div>
        </div>
    </div>
</section> <!-- end single post -->
@endpush
@push('javascript')
<script>
</script>
@endpush