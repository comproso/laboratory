<!DOCTYPE html>
<html>
    <head>
        <title>comproso — laboratory</title>
         <meta charset="UTF-8">
        <link href="{{ asset('assets/semantic-ui/semantic.min.css') }}" type="text/css" rel="stylesheet">
		<script src="{{ asset('assets/jquery/jquery.min.js') }}" type="text/javascript"></script>
		<script src="{{ asset('assets/semantic-ui/semantic.min.js') }}" type="text/javascript"></script>
	    <script src="{{ asset('vendor/comproso/framework/comproso.js') }}" type="text/javascript"></script>
        <?php if(isset($assets)):
	        	foreach($assets as $asset):
	        		if(preg_match("/(\.js)$/i", $asset)): ?>
			<script src="{{ asset($asset) }}" type="text/javascript"></script>
				<?php elseif(preg_match("/(\.css)$/i", $asset)): ?>
	        <link href="{{ asset($asset) }}" type="text/css" rel="stylesheet">
        <?php 		endif;
	        	endforeach;
	        endif; ?>
    </head>
    <body id="comproso" onload="sendRequest('html')">
	    <!-- content //-->
    </body>
</html>
