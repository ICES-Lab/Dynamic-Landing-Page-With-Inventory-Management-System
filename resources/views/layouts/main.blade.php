<!DOCTYPE html>
<html lang="en">

<head>
	<title>@yield('title','ICES')</title>

	<meta charset="utf-8">
	<!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="description" content="">

	<!-- Google Fonts -->
	<link href='https://fonts.googleapis.com/css?family=Barlow:400,600%7COpen+Sans:400,400i,700' rel='stylesheet'>

	<!-- Css -->
	<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" />
	<link rel="stylesheet" href="{{asset('css/font-icons.css')}}" />
	<link rel="stylesheet" href="{{asset('revolution/css/settings.css')}}" />
	<link rel="stylesheet" href="{{asset('css/style.css')}}" />

	<!-- Favicons -->
	<link rel="shortcut icon" href="{{$data->head_icon_pic ? asset('storage/'.$data->head_icon_pic) : asset('storage/Main/favicon.ico')}}">
    @stack('internalCss')
</head>
<body>
    <div class="loader-mask">
		<div class="loader">
			"Loading..."
		</div>
	</div>

	<main class="main-wrapper">
        @include('layouts.includes.header')
        <div class="content-wrapper content-wrapper--boxed oh">
        @stack('bodycontent')
        @include('layouts.includes.footer')
            <div id="back-to-top">
				<a href="#top"><i class="ui-arrow-up"></i></a>
			</div>
        </div>
    </main>
    @include('layouts.includes.jquery')
    @stack('javascript')
</body>
</html>