@extends('layouts.main')
@section('title','Collaborations')
@push('internalCss')
<style>
</style>
@endpush
@push('bodycontent')
<section class="page-title bg-dark-overlay text-center" style="background-image: url(img/page-title/portfolio.jpg);">
    <div class="container">
        <div class="page-title__holder">
            <h1 class="page-title__title">Collaborations</h1>
            <p class="page-title__subtitle">We establish a good relationship with our collaborations</p>
        </div>
    </div>
</section> <!-- end page title -->

<!-- Portfolio -->
<section class="section-wrap">
    <div class="container-fluid container-semi-fluid">			

        <!-- Filter -->
        <!-- <div class="masonry-filter text-center">
            <a href="#" class="filter active" data-filter="*">All</a>
            <a href="#" class="filter" data-filter=".residential">Residential</a>
            <a href="#" class="filter" data-filter=".commercial">Commercial</a>
            <a href="#" class="filter" data-filter=".interior">Interior</a>
            <a href="#" class="filter" data-filter=".landscape">Landscape</a>
        </div>  -->
        <!-- end filter -->

        <div class="row masonry-grid">
            <div class="masonry-item col-lg-3 project hover-trigger commercial">
                <div class="project__container">
                    <div class="project__img-holder">
                        <a href="/collaboration">
                            <img src="img/portfolio/2.jpg" alt="" class="project__img">
                            <div class="hover-overlay">
                                <div class="project__description">
                                    <h3 class="project__title">Collaboration Name</h3>
                                    <span class="project__date">Collaboration Location</span>
                                </div>
                            </div>
                        </a>              
                    </div>                  
                </div> 
            </div> 
            <!-- end project -->
        </div>
    </div>
</section> 
@endpush
@push('javascript')
<script>
</script>
@endpush