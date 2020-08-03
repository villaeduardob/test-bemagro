<?php
	header("Last-Modified: ".gmdate("D, d M Y H:i:s")." GMT");
	header("Cache-Control: no-store, no-cache, must-revalidate");
	header("Cache-Control: post-check=0, pre-check=0", false);
	header("Pragma: no-cache");
	setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
	date_default_timezone_set('America/Sao_Paulo');
?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="icon" href="images/favicon-bemagro.png" type="image/png">
	<title>Test - Bem Agro</title>
	<link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/sign-in/">

	@if ($arrCss)
		@foreach ($arrCss as $css)
			{!! HTML::style($css) !!}
		@endforeach
	@endif
</head>
<body class="text-center">

	<?php # conteudo ?>
	@yield('content')

	<?php # exibe JS controller ?>
	@if ($arrJs)
		@foreach ($arrJs as $js)
			{!! HTML::script($js) !!}
		@endforeach
	@endif

</body>
</html>