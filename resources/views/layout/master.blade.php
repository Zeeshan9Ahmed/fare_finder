<!DOCTYPE html>
<html>
<head>
	<!-- META TAGS-->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="robots" content="noindex" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0,user-scalable=no">
	<!-- META TAGS-->
	<title>Calendar App</title>	
	<link rel="icon" href="{{asset('assets/images/favicon.png')}}" />
	<!-- BOOTSTRAP 5 -->	
	<link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}" />
	<!-- BOOTSTRAP 5 -->
	<!-- RESPONSIVE NAVIFATION -->
	<link rel="stylesheet" href="{{asset('assets/css/stellarnav.min.css')}}" />
	<!-- RESPONSIVE NAVIFATION -->
	<!-- SWIPER SLIDER -->
	<link rel="stylesheet" href="{{asset('assets/css/swiper-bundle.min.css')}}">
	<!-- SWIPER SLIDER -->
	<!-- GOOGLE FONTS -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
	<!-- GOOGLE FONTS -->
	<!-- FANCY BOX IMAGE VIEWER -->
	<link rel="stylesheet" href="{{asset('assets/css/jquery.fancybox.min.css')}}" />
	<!-- FANCY BOX IMAGE VIEWER -->
	<!-- FONT AWESOME -->
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"></li>
	<!-- FONT AWESOME -->
	<!-- DATATABLE SHEETS -->
	<link rel="stylesheet" href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
	<!-- DATATABLE SHEETS -->
	<!-- STYLE SHEETS -->
	<link rel="stylesheet" href="{{asset('assets/css/style.css')}}" />
	<link rel="stylesheet" href="{{asset('assets/css/responsive.css')}}" />

	<link rel="stylesheet" href="{{asset('assets/css/jquery.growl.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/notifIt.css')}}">
    @yield('additional_styles')
	<!-- STYLE SHEETS -->
</head>

<body>
 <input type="hidden" id="mSg" color="success" title="Success" value="Welcome"> 	
<section class="gen-sec dashboard-sec">
	<div class="contianer-fluid p-0">
        @include('layout.header')
		<div class="secRow d-flex">
        @include('layout.side-menu')

			<div class="mainContent">
			@yield('content')
            @include('layout.footer-bar')
			</div>
		</div>
	</div>
</section>


@include('layout.footer-scripts')
@yield('additional_scripts')
</body>
</html>