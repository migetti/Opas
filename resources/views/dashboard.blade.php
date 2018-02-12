@extends('layouts.master')
@section('title', 'Dashboard')
@section('content')
    @section('links')
        {!! HTML::link('/profile', 'PROFILE') !!} </br>
        {!! HTML::link('/browse', 'BROWSE USERS') !!}
    @stop
    <h1>Dashboard</h1>
@stop