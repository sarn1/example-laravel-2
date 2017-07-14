@extends('layouts.main')
@section('content')
	<h1>Hi {{{ $data['name'] }}} !</h1>

	@if (isset($data['something']))
		OK!
	@else
		NO - something is not set!
	@endif

	<hr>

	<ul>
	@foreach ($data as $d)
		<li>{{{ $d }}}</li>
	@endforeach
	</ul>

	<hr>
	<h3>Not escape user data</h3>
	<ul>
	@foreach ($data as $d)
		<li>{!! $d !!}</li>
		@endforeach
	</ul>

@stop
