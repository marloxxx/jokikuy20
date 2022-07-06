<!DOCTYPE html>
<html dir="ltr" lang="en-US">

@include('theme.landing.head')

<body class="stretched">

	<!-- Document Wrapper
	============================================= -->
	<div id="wrapper" class="clearfix">

		<!-- Header
		============================================= -->
		@include('theme.landing.header')
        <!-- #header end -->

		{{ $slot }}

		<!-- Footer
		============================================= -->
		@include('theme.landing.footer')
        <!-- #footer end -->

	</div><!-- #wrapper end -->

	<!-- Go To Top
	============================================= -->
	<div id="gotoTop" class="icon-angle-up"></div>

	<!-- JavaScripts
	============================================= -->
	@include('theme.landing.js')
	<!-- Footer Scripts
	============================================= -->
	@yield('custom_js')

</body>

</html>