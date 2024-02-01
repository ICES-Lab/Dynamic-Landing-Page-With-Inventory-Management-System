@extends('layouts.main')
@section('title','Faculties')
@push('internalCss')
<style>
</style>
@endpush
@push('bodycontent')
<section class="page-title bg-dark-overlay text-center" style="background-image: url(img/page-title/about.jpg);">
        <div class="container">
          <div class="page-title__holder">
            <h1 class="page-title__title">Laboratory Incharges</h1>
						<p class="page-title__subtitle">Our Laboratory's Incharges </p>
          </div>
        </div>
      </section> <!-- end page title -->

			<!-- Intro -->
			<section class="section-wrap">
				<div class="container">
					<div class="row justify-content-center">
						<div class="col-lg-10">
							<div class="intro text-center">
								<h2 class="mb-32">Our Mission</h2>
								<p class="lead">To encourage scientific exchanges amongst academia and industry personnel in the field of Wireless Communication and Embedded Systems.
								To provide research support and consultation for industry and other government organizations. 
								To use the latest facilities in order to provide technical training programs in the field of Wireless Communication and Embedded Systems.
								To organize seminars and workshops with an aim to promoting research lifestyle to the student community and enhance the spirit of research by eminent Professors.
								To motivate and train students to participate in national and international competitions.</p>
							</div>
						</div>
					</div>
				</div>
			</section> <!-- end intro -->


			<!-- Teachers -->
			<section class="section-wrap pt-0 pb-0">
				<div class="container">
					<div class="row">
						<div class="col-xl-4 col-lg-6">
							<div class="service-1">
								<a href="/incharge" class="service-1__url hover-scale">
									<img src="img/services/v-2/1.jpg" class="service-1__img" alt="">
								</a>								
								<div class="service-1__info">
									<h3 class="service-1__title">Faculty Name</h3>
									<ul class="service-1__features">
										<li class="service-1__feature">
											<i class="ui-star service-1__feature-icon"></i>
											<span class="service-1__feature-text">Faculty Level</span>
										</li>
										<li class="service-1__feature">
											<i class="ui-star service-1__feature-icon"></i>
											<span class="service-1__feature-text">Faculty Department</span>
										</li>
										<li class="service-1__feature">
											<i class="ui-star service-1__feature-icon"></i>
											<span class="service-1__feature-text">Faculty Mail</span>
										</li>
									</ul>
								</div>
							</div>
						</div>
						<!-- <div class="col-xl-4 col-lg-6">
							<div class="service-1">
								<a href="#" class="service-1__url hover-scale">
									<img src="img/services/v-2/2.jpg" class="service-1__img" alt="">
								</a>								
								<div class="service-1__info">
									<h3 class="service-1__title">Exterior design</h3>
									<ul class="service-1__features">
										<li class="service-1__feature">
											<i class="ui-check service-1__feature-icon"></i>
											<span class="service-1__feature-text">Modern Design</span>
										</li>
										<li class="service-1__feature">
											<i class="ui-check service-1__feature-icon"></i>
											<span class="service-1__feature-text">Unique Foundation</span>
										</li>
										<li class="service-1__feature">
											<i class="ui-check service-1__feature-icon"></i>
											<span class="service-1__feature-text">Smart Headting System</span>
										</li>
									</ul>
								</div>
							</div>
						</div>
						<div class="col-xl-4 col-lg-6">
							<div class="service-1">
								<a href="#" class="service-1__url hover-scale">
									<img src="img/services/v-2/3.jpg" class="service-1__img" alt="">
								</a>								
								<div class="service-1__info">
									<h3 class="service-1__title">Industrial premises</h3>
									<ul class="service-1__features">
										<li class="service-1__feature">
											<i class="ui-check service-1__feature-icon"></i>
											<span class="service-1__feature-text">Modern Design</span>
										</li>
										<li class="service-1__feature">
											<i class="ui-check service-1__feature-icon"></i>
											<span class="service-1__feature-text">Unique Foundation</span>
										</li>
										<li class="service-1__feature">
											<i class="ui-check service-1__feature-icon"></i>
											<span class="service-1__feature-text">Smart Headting System</span>
										</li>
									</ul>
								</div>
							</div>
						</div> -->
					</div>
				</div>
      </section> <!-- end Teachers -->
      

      <!-- Statistic -->
      <div class="container">
        <div class="statistic-wrap">
          <div class="row">
            <div class="col-md-3">
              <div class="statistic">
                <span class="statistic__number">17</span>
                <h5 class="statistic__title">Products</h5>
              </div>
            </div>
            <div class="col-md-3">
              <div class="statistic">
                <span class="statistic__number">84</span>
                <h5 class="statistic__title">Lab Members</h5>
              </div>
            </div>
            <div class="col-md-3">
              <div class="statistic">
                <span class="statistic__number">5</span>
                <h5 class="statistic__title">Skills Conducted</h5>
              </div>
            </div>
            <div class="col-md-3">
              <div class="statistic">
                <span class="statistic__number">28</span>
                <h5 class="statistic__title">Acheivements</h5>
              </div>
            </div>
          </div>
        </div>
      </div> <!-- end statistic -->

      <!-- Team -->
      <!-- <section class="section-wrap">
        <div class="container">
          <div class="row">
            <div class="col-lg-3">
              <div class="blog-grid__title-col d-flex flex-column mb-lg-48">
                <div class="title-row">
                  <p class="subtitle">team</p>
                  <h2 class="section-title">Our specialists</h2>
                  <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequun tur magni dolores eos qui
                  ratione</p>
                </div>
              </div>							
            </div>

            <div class="col-lg-8 offset-lg-1">
              <div class="slick-slider slick-team">
                <div class="team-col">
                  <div class="team hover-trigger">
                    <div class="team__img-holder">
                      <img src="img/team/1.jpg" alt="" class="team__img">
                      <div class="hover-overlay">
                        <div class="team__details text-center">
                          <div class="socials socials--white">
                            <a href="#" class="social social-twitter" aria-label="twitter" title="twitter" target="_blank"><i class="ui-twitter"></i></a>
                            <a href="#" class="social social-facebook" aria-label="facebook" title="facebook" target="_blank"><i class="ui-facebook"></i></a>
                            <a href="#" class="social social-youtube" aria-label="youtube" title="google plus" target="_blank"><i class="ui-youtube"></i></a>
                            <a href="#" class="social social-instagram" aria-label="instagram" title="instagram" target="_blank"><i class="ui-instagram"></i></a>
                          </div>
                        </div>
                      </div>
                    </div>										
                    <h5 class="team__name">Melissa Shredinger</h5>
                    <span class="team__occupation">Interior Designer</span>								
                  </div>
                </div>

                <div class="team-col">
                  <div class="team hover-trigger">
                    <div class="team__img-holder">
                      <img src="img/team/2.jpg" alt="" class="team__img">
                      <div class="hover-overlay">
                        <div class="team__details text-center">
                          <div class="socials socials--white">
                            <a href="#" class="social social-twitter" aria-label="twitter" title="twitter" target="_blank"><i class="ui-twitter"></i></a>
                            <a href="#" class="social social-facebook" aria-label="facebook" title="facebook" target="_blank"><i class="ui-facebook"></i></a>
                            <a href="#" class="social social-youtube" aria-label="youtube" title="google plus" target="_blank"><i class="ui-youtube"></i></a>
                            <a href="#" class="social social-instagram" aria-label="instagram" title="instagram" target="_blank"><i class="ui-instagram"></i></a>
                          </div>
                        </div>
                      </div>
                    </div>										
                    <h5 class="team__name">Donald Thompson</h5>
                    <span class="team__occupation">Architect</span>								
                  </div>
                </div>

                <div class="team-col">
                  <div class="team hover-trigger">
                    <div class="team__img-holder">
                      <img src="img/team/3.jpg" alt="" class="team__img">
                      <div class="hover-overlay">
                        <div class="team__details text-center">
                          <div class="socials socials--white">
                            <a href="#" class="social social-twitter" aria-label="twitter" title="twitter" target="_blank"><i class="ui-twitter"></i></a>
                            <a href="#" class="social social-facebook" aria-label="facebook" title="facebook" target="_blank"><i class="ui-facebook"></i></a>
                            <a href="#" class="social social-youtube" aria-label="youtube" title="google plus" target="_blank"><i class="ui-youtube"></i></a>
                            <a href="#" class="social social-instagram" aria-label="instagram" title="instagram" target="_blank"><i class="ui-instagram"></i></a>
                          </div>
                        </div>
                      </div>
                    </div>										
                    <h5 class="team__name">Melissa Shredinger</h5>
                    <span class="team__occupation">Sedona White</span>								
                  </div>
                </div>

              </div> 
			  end slider
            </div>

          </div>
        </div>
      </section> 
	  end team -->


			<!-- Partners -->
			<div class="partners bg-light text-center">
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <a href="#">
                        <img src="img/partners/11.png" alt="me">
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