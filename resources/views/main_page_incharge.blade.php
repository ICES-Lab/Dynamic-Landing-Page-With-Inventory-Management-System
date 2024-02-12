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
            @foreach($incharge as $value)
						<div class="col-xl-4 col-lg-6">
							<div class="service-1">
								<a href="{{ route('subpage', ['main_slug' => 'incharges', 'sub_slug' => $value->slug]) }}" class="service-1__url hover-scale">
									<img src="{{asset('storage/Incharges/'.$value->profile_img)}}" class="service-1__img" alt="">
								</a>								
								<div class="service-1__info">
									<h3 class="service-1__title">{{$value->name}}</h3>
									<ul class="service-1__features">
										<li class="service-1__feature">
											<i class="ui-star service-1__feature-icon"></i>
											<span class="service-1__feature-text">{{$value->level}}</span>
										</li>
										<li class="service-1__feature">
											<i class="ui-star service-1__feature-icon"></i>
											<span class="service-1__feature-text">{{$value->department}}</span>
										</li>
										<li class="service-1__feature">
											<i class="ui-star service-1__feature-icon"></i>
											<span class="service-1__feature-text">{{$value->email}}</span>
										</li>
									</ul>
								</div>
							</div>
						</div>
            @endforeach
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