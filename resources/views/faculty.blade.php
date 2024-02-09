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
<section class="page-title page-title--tall blog-featured-img bg-dark-overlay text-center" style="background-image: url(img/blog/background.jpg);">
    <div class="container">
        <!-- <aside class="box-image-sec"> <img src="{{asset('img/portfolio/1.jpg')}}"> </aside> -->
        <div class="page-title__holder">
            <img id="imageInCentre" src="{{asset('img/portfolio/1.jpg')}}">
            <h1 class="page-title__title">Incharge Name</h1>
            <ul class="entry__meta">
                <li class="entry__meta-date">
                    <span>Incharge detail 1</span>
                </li>
                <li class="entry__meta-author">
                    <a href="#">DeoThemes</a>
                </li>
                <li class="entry__meta-category">
                    <a href="#">Marketing</a>
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
                                            <a class="social social-facebook" href="#" title="facebook" target="_blank" aria-label="facebook">
                                                <i class="ui-facebook"></i>
                                            </a>
                                            <a class="social social-twitter" href="#" title="twitter" target="_blank" aria-label="twitter">
                                                <i class="ui-twitter"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div> <!-- end share -->
                        
                                <div class="entry__article">

                                <aside class="col-xl-9">
                                    <div class="Faculty-details-right">
                                        <div class="Faculty-details-right-box-1 Professional-Experience">
                                        <div class="row">
                                            <aside class="col-md-12">
                                                <div class="box-sec-top">
                                                <div class="box-sec ">
                                                    <aside class="">
                                                    <h3>Professional Experience</h3>
                                                    </aside>
                                                </div>
                                                </div>
                                            </aside>
                                            <aside class="col-md-12 box-sec-bottom"> 
                                                <div class="table-responsive">
                                                    <table class="table table-responsive table-bordered table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th style="text-align: center;">Experience Type</th>
                                                                <th style="text-align: center;">Organization</th>
                                                                <!-- <th style="text-align: center;">Designation</th> -->
                                                                <th style="text-align: center;">From</th>
                                                                <th style="text-align: center;">To</th>
                                                                <th style="text-align: center;">Total Experience</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr role="row" class="odd">
                                                                <td>Engineering</td>
                                                                <td>Bannari Amman Institute of Technology, Sathyamangalam</td>
                                                                <!-- <td>Assistant Professor</td> -->
                                                                <td class="text-center" id="startdate">22.05.2017</td>
                                                                <td class="text-center" id="enddate">03.02.2024</td>
                                                                <td class="text-center" id="exact_age">6 Year(s)  &amp; 8 Month(s) </td>
                                                            </tr>        
                                                        </tbody>
                                                    </table>
                                                </div> 
                                            </aside>
                                        </div>
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