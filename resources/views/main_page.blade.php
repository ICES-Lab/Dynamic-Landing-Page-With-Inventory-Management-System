@extends('layouts.main')
@section('title',$data->name)
@push('internalCss')
<style>
</style>
@endpush
@push('bodycontent')
<section class="page-title bg-dark-overlay text-center" style="background-image: url({{asset('storage/MainPages/'.$data->page_pic)}});">
    <div class="container">
        <div class="page-title__holder">
            <h1 class="page-title__title">{{$data->content}}</h1>
            <p class="page-title__subtitle">{{$data->quote}}</p>
        </div>
    </div>
</section> <!-- end page title -->

<!-- Portfolio -->
<section class="section-wrap">
    <div class="container-fluid container-semi-fluid">			
        <div class="row masonry-grid">
            @foreach ($subpages as $subpage)
            <div class="masonry-item col-lg-3 project hover-trigger interior">
                <div class="project__container">
                    <div class="project__img-holder">
                    <a href="{{ route('subpage', ['main_slug' => $data->slug, 'sub_slug' => $subpage->slug]) }}">
                            <img src="{{asset('storage/SubPages/'.$subpage->active_img)}}" alt="" class="project__img">
                            <div class="hover-overlay">
                                <div class="project__description">
                                    <h3 class="project__title">{{$subpage->name}}</h3>
                                    <span class="project__date">{{$subpage->detail}}</span>
                                </div>
                            </div>
                        </a>              
                    </div>                  
                </div> 
            </div> 
            @endforeach
            <!-- end project -->
        </div>
    </div>
</section> 
@endpush
@push('javascript')
<script>
</script>
@endpush