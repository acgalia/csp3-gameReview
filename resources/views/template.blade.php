<!DOCTYPE html>
<html>
<head>
	<title>@yield('title')</title>
	@include('header')
</head>
<body>
	@include('nav')

	@yield('body')
	@yield('admin_body')

</body>
</html>