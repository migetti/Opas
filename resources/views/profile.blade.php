@extends('layouts.master')
@section('title', 'Profile')
@section('content')
	@section('links')
		{!! HTML::link('/dashboard', 'DASHBOARD') !!}
	@stop
	<!--Error labels for false inputs-->
    @if (count($errors) > 0)
	   <ul>
	   @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
	   @endforeach
	   </ul>
	@endif
	<h1>Profile Page</h1>
	
	@if(Session::has('update'))
		<p>{{ Session::get('update') }}</p>
	@elseif(Session::has('skill_removed'))
		<p>{{ Session::get('skill_removed') }}
	@elseif(Session::has('pw_not_match'))
		<p>{{ Session::get('pw_not_match') }}
	@elseif(Session::has('pw_changed'))
		<p>{{ Session::get('pw_changed') }}
	@endif
	
	<!-- Authenticated user's information listed in form -->
	{!! Form::model($user, array('url' => '/update')) !!}
		{!! Form::label('firstname', 'First Name') !!}
		{!! Form::text('firstname') !!}
		</br>
		{!! Form::label('lastname', 'Last Name') !!}
		{!! Form::text('lastname') !!}
		</br>	
		{!! Form::label('email', 'Email') !!}
		{!! Form::email('email') !!}
		</br>
		{!! Form::submit('Update') !!}
	{!! Form::close() !!}
	
	{!! Form::open(array('url' => 'change-password')) !!}
		{!! Form::password('password', array('placeholder' => 'Password')) !!}
		</br>
		{!! Form::password('new_password', array('placeholder' => 'New Password')) !!}
		</br>
    	{!! Form::password('new_password_confirmation', array('placeholder' => 'Confirm New Password')) !!}
		</br>
		{!! Form::submit('Change Password') !!}
	{!! Form::close() !!}
	
	
	<!-- List all authenticated users's skills if has any-->
	@if(count($user->skills) != 0)
	<ul>
		@foreach($user->skills as $skill)
			<li>
				<a href="{{ url('/removeskill', $skill->id) }}">{{ $skill->title }}</a>
			</li>
		@endforeach
	</ul>
	@endif

@stop