@extends('layouts.main')
@section('title','Collaboration')
@push('internalCss')
<style>
</style>
@endpush
@push('bodycontent')
<div class="slick-slider slick-single-image">
    <img src="img/portfolio/featured.jpg" class="project__featured-img" alt="">
    <img src="img/portfolio/featured.jpg" class="project__featured-img" alt="">
    <img src="img/portfolio/featured.jpg" class="project__featured-img" alt="">
</div>			

<section class="section-wrap pt-72 pb-32">
    <div class="container">
        <div class="row">
    
            <div class="col-lg-8 project__info mb-md-40">
                <h1>Collaboration Name</h1>
                <p>Collaboration 1-Nulla porttitor accumsan tincidunt praesent sapien massa convallis pellen tesque necp egestas non nisi vivamus suscipite
                    nulla porttitor accumsan tincidunt praesent sapien massa convallisa pellentesque.
                </p>
                <p>Collaboration 2-Lorem ipsum dolor sit met, consectetur adipiscing elit. Integer imperdiet iaculis ipsum aliquet ultricies. Sed a tincidunt enim. Mecenas ultraces viverra ligula, vel lobortis ante pulvinar sed. Doce erat magna, aliquot vitae semper vitae, accusant vel nis. Vivamus pellentesque orci sit met odio dictum eget kommod nulla consequent.</p>
                <h1>Collaboration Details</h1>
                <p>Success is not a spectator sport, something that just happens before your eyes. It’s an experience, a game that must be played
                to be enjoyed fully. You need to get involved with life. You’ll need to get more involved with your family, friends, people
                you see every day. Because in that involvement, you’ll find you have everything you need to succeed.</p>
                <div class="gallery gallery-size-large">
                    <figure class="gallery-item">
                        <div class="gallery-icon landscape">
                            <img src="img/services/single/1.jpg" class="attachment-large size-large"
                            alt="">
                        </div>
                    </figure>
                    <figure class="gallery-item">
                        <div class="gallery-icon landscape">
                            <img src="img/services/single/2.jpg" class="attachment-large size-large"
                            alt="">
                        </div>
                    </figure>
                </div>
            </div> <!-- project info -->
    
            <div class="col-lg-4 project__details">
                <ul class="project__meta">
                    <li class="project__meta-item">
                        <span class="project__meta-label">Collaboration:</span>
                        <span class="project__meta-value">VDV Solutions</span>
                    </li>
                    <li class="project__meta-item">
                        <span class="project__meta-label">Collaboration Date:</span>
                        <span class="project__meta-value">05.04.2017</span>
                    </li>
                    <li class="project__meta-item">
                        <span class="project__meta-label">Collaboration Location:</span>
                        <span class="project__meta-value">Chennai, TN</span>
                    </li>
                </ul>
                <h6 class="share-label">Social Media:</h6>
                <div class="socials">
                    <a href="#" class="social social-twitter" aria-label="twitter" title="twitter" target="_blank"><i class="ui-twitter"></i></a>
                    <a href="#" class="social social-facebook" aria-label="facebook" title="facebook" target="_blank"><i class="ui-facebook"></i></a>
                    <a href="#" class="social social-youtube" aria-label="youtube" title="google plus" target="_blank"><i class="ui-youtube"></i></a>
                    <a href="#" class="social social-instagram" aria-label="instagram" title="instagram" target="_blank"><i class="ui-instagram"></i></a>
                </div>
            </div>
    
        </div>
    </div>
</section>
@endpush
@push('javascript')
<script>
</script>
@endpush