<!DOCTYPE HTML>
<!--
	Dopetrope by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Marca Personal F.P.</title>

		<meta charset="utf-8" />

        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
		<link rel="stylesheet" href="{{ asset('/dopetrope/assets/css/main.css') }}" />
        <link rel="shortcut icon" href=" {{ asset('/images/mp-logo.png') }}" type="image/x-icon">

    </head>
	<body class="homepage is-preload">
		<div id="page-wrapper">

			<!-- Header -->
            @include('dopetrope.partials.header')

			<!-- Main -->
            @include('dopetrope.partials.main')

			<!-- Footer -->
            @include('dopetrope.partials.footer')

		</div>

		<!-- Scripts -->
<script src="{{ asset('/dopetrope/assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('/dopetrope/assets/js/jquery.dropotron.min.js') }}"></script>
<script src="{{ asset('/dopetrope/assets/js/browser.min.js') }}"></script>
<script src="{{ asset('/dopetrope/assets/js/breakpoints.min.js') }}"></script>
<script src="{{ asset('/dopetrope/assets/js/util.js') }}"></script>
<script src="{{ asset('/dopetrope/assets/js/main.js') }}"></script>
	</body>
</html>
