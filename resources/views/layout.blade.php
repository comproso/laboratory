<!DOCTYPE html>
<html>
    <head>
        <title>comproso - laboratory</title>
        <meta charset="UTF-8">
        <link href="{{ asset('assets/semantic-ui/semantic.min.css') }}" type="text/css" rel="stylesheet">
		<script src="{{ asset('assets/jquery/jquery.min.js') }}" type="text/javascript"></script>
		<script src="{{ asset('assets/semantic-ui/semantic.min.js') }}" type="text/javascript"></script>
		@yield('head')
    </head>
    <body class="@yield('bodycss')">
	    <div id="container">
			<section id="main">
				@yield('main')
			</section>
		</div>
    </body>
</html>
