@extends('layouts.main')
@section('title',$data->name)
@push('internalCss')
<style>
</style>
@endpush
@push('bodycontent')
<section class="page-title bg-dark-overlay text-center" style="background-image: url({{asset('storage/MainPages/'.$data->page_pic)}})">
        <div class="container">
          <div class="page-title__holder">
            <h1 class="page-title__title">{{$data->content}}</h1>
						<p class="page-title__subtitle">{{$data->quote}}</p>
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
								<p class="lead">{!! $data->mission !!}</p>
							</div>
						</div>
					</div>
				</div>
			</section> <!-- end intro -->


			<!-- Teachers -->
			<section class="section-wrap pt-0 pb-0">
				<div class="container">
					<div class="row">
            <!-- 1 Teacher -->
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
            <!-- end Teacher -->
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