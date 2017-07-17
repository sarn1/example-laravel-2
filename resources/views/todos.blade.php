@extends('layouts.main')
@section('content')
	<h1>All Todos!</h1>
	<ul>
		@foreach ($todo_lists as $list)
			<li>{{{ $list->name }}}</li>
	  @endforeach
	</ul>
@stop
