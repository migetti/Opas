@extends('layouts.master')
@section('title', 'Browse')
@section('content')
	@section('links')
		{!! HTML::link('/dashboard', 'DASHBOARD') !!}
	@stop
	<h1>Browse users</h1>
<ul>
	@foreach($users as $user)

	<li>
		<a href="{{$user->email}}">{{ $user->name }}</a>
	</li>
	@endforeach
</ul>
@stop
