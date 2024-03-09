@extends('layouts.main')
@section('title',$data->name)
@push('internalCss')
<style>
</style>
@endpush
@push('bodycontent')
<div class="slick-slider slick-single-image">
    <img src="{{asset('storage/'.$data->img1)}}" class="project__featured-img" alt="">
    @if ($data->img2)
    <img src="{{asset('storage/'.$data->img2)}}" class="project__featured-img" alt="">
    @endif
    @if ($data->img3)
        <img src="{{asset('storage/'.$data->img3)}}" class="project__featured-img" alt="">
    @endif
</div>			

<section class="section-wrap pt-72 pb-32">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 project__info mb-md-40">
                @foreach($left as $leftside)
                <h1>{{$leftside->title}}</h1>
                <p>{!! $leftside->content !!}</p>
                <div class="gallery gallery-size-large">
                @if($leftside->img1)
                    <figure class="gallery-item">
                        <div class="gallery-icon landscape">
                            <img src="{{asset('storage/'.$leftside->img1)}}" class="attachment-large size-large"
                            alt="">
                        </div>
                    </figure>
                @endif
                @if($leftside->img2)
                    <figure class="gallery-item">
                        <div class="gallery-icon landscape">
                            <img src="{{asset('storage/'.$leftside->img2)}}" class="attachment-large size-large"
                            alt="">
                        </div>
                    </figure>
                @endif
                </div>
                @endforeach
            </div> <!-- project info -->
    
            <div class="col-lg-4 project__details">
                @foreach($right as $rightside)
                <ul class="project__meta">
                    <li class="project__meta-item">
                        <span class="project__meta-label">{{$rightside->title.':'}}</span>
                        <span class="project__meta-value">{!!$rightside->content!!}</span>
                    </li>
                </ul>
                @endforeach
                @if($social->isNotEmpty())
                <h6 class="share-label">Social Media Links:</h6>
                <div class="socials">
                    @foreach($social as $media)
                    <a href="{{$media->link}}" class="social" target="{{$media->target}}"><i class="{{$media->icon_code}}"></i></a>
                    @endforeach
                </div>
                @endif
            </div>
        </div>
    </div>
</section>
@endpush
@push('javascript')
<script>
</script>
@endpush