@extends('layouts.master')
@section('title', 'Welcome')
@section('content')
    @section('links')
        {!! HTML::link('/', 'HOME') !!}
    @stop
    <div class="title">OPAS.IO</div>
    <div id="time">{{date('G.i.s')}}</div>
    <hr>
    
    <!--Error labels for false inputs-->
    @if (count($errors) > 0)
	   <ul>
	   @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
	   @endforeach
	   </ul>
	@endif
    
    <!--
        HTML forms created using blade templating engine and illuminate/html dependency: https://github.com/illuminate/html
        
        Benefits:
        - Readability
        - Security
            - Default csrf token
            - html escaping
    -->
    
    {!! Form::open(array('url' => 'auth/register')) !!}
    
        {!! Form::text('firstname', null, array('placeholder' => "First Name")) !!}
        
        {!! Form::text('lastname', null, array('placeholder' => "Last Name")) !!}
        
        {!! Form::email('email', null, array('placeholder' => 'Email')) !!}
        
        {!! Form::password('password', array('placeholder' => 'Password')) !!}
        
        {!! Form::password('password_confirmation', array('placeholder' => 'Confirm Password')) !!}
        
        {!! Form::submit('Register') !!}
    {!! Form::close() !!}
    </br>
    {!! Form::open(array('url' => 'auth/login')) !!}
    
        {!! Form::email('email', null, array('placeholder' => 'Email')) !!}
        
        {!! Form::password('password', array('placeholder' => 'Password')) !!}
        
        {!! Form::submit('Login') !!}
        
       <!--TODO: Remember me checkbox-->
    {!! Form::close() !!}
    
    <!--Traditional form for reference-->
    
    <!--<form method="POST" action="/auth/register">
    {!! csrf_field() !!}

    <div>
        First Name
        <input type="text" name="firstname" value="{{ old('firstname') }}">
    </div>
    <div>
        LAst Name
        <input type="text" name="lastname" value="{{ old('lastname') }}">
    </div>

    <div>
        Email
        <input type="email" name="email" value="{{ old('email') }}">
    </div>

    <div>
        Password
        <input type="password" name="password">
    </div>

    <div>
        Confirm Password
        <input type="password" name="password_confirmation">
    </div>

    <div>
        <button type="submit">Register</button>
    </div>
</form>-->


    <!--About section goes here-->
    <h1>About-section</h1>
    <h2>Goal</h2>
    <h2>F.A.Q.</h2>
    <h2>Team</h2>
    <hr>
    
    <!--Introduction to the application-->
    <h1>Try it-section</h1>
    <script>
        setInterval(function(){
            document.getElementById("time").innerHTML = new Date().toLocaleTimeString()}, 1000)
    </script>
@stop

