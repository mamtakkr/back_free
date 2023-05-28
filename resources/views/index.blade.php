@extends('layouts.front')

@section('content')

@if(Auth::check())
    @include('partials.after_login_index', $members)
@else
    @include('partials.before_login_index')
@endif

@endsection