<!DOCTYPE html>
<html ng-app="App">
<head>
	<meta charset="UTF-8">
	<title>@yield('title')</title>
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  <script src="{{ URL::to('lib/js/app.js') }}"></script>
  <link rel="stylesheet" href="{{ URL::asset('lib/css/custom.css') }}">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.css">
  <script>  var baseUrl = "{{ asset('/') }}"; </script>﻿



</head>
<body>
	@include('layouts.header')
  <div class="contetnt">
    @yield('content')
    <link href="{{ URL::asset('lib/css/lightbox.css') }}" rel="stylesheet">
    <script src="{{ URL::to('lib/js/lightbox.js') }}"></script>
  </div>
</body>
</html>
