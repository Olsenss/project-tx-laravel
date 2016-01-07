<!DOCTYPE html>
<html>
<head>
	<title>Project TX</title>
	<link rel="stylesheet" type="text/css" href="{{ elixir('output/final.css') }}">
</head>
<body>
@include('partials.navbar')

	<div class="container">
	@include('flash::message')

	@yield('content')

	</div>

	<script type="text/javascript" src="/output/final.js"></script>
	<script>
		$('#flash-overlay-modal').modal();
		//$('div.alert').not('alert-important').delay(3000).slideUp(3000);
	</script>

	@yield('footer')
	
</body>
</html>