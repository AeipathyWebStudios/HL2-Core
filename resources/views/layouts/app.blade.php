<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('pageTitle') - {{ config('app.name') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
	<link rel="stylesheet" href="{{ URL::asset('css/main.css') }}" />
	
	<style type="text/css">
		.main{ background-color:#fff; padding:20px; }
		.navbar-default { margin-bottom:25px; }
	</style>
</head>
<body>

	@include('layouts.nav')

	<div class='container main'>
		@yield('content')
	</div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
	
</body>
</html>
