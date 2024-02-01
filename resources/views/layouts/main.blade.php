<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from deothemes.com/envato/sedona/html/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 22 Jan 2024 10:41:36 GMT -->
<head>
	<title>@yield('title','Custom Auth laravel')</title>

	<meta charset="utf-8">
	<!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="description" content="">

	<!-- Google Fonts -->
	<link href='https://fonts.googleapis.com/css?family=Barlow:400,600%7COpen+Sans:400,400i,700' rel='stylesheet'>

	<!-- Css -->
	<link rel="stylesheet" href="css/bootstrap.min.css" />
	<link rel="stylesheet" href="css/font-icons.css" />
	<link rel="stylesheet" href="revolution/css/settings.css" />
	<link rel="stylesheet" href="css/style.css" />

	<!-- Favicons -->
	<link rel="shortcut icon" href="img/favicon.ico">
	<link rel="apple-touch-icon" href="img/apple-touch-icon.html">
	<link rel="apple-touch-icon" sizes="72x72" href="img/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="114x114" href="img/apple-touch-icon-114x114.png">
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
        @stack('bodycontent','')
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