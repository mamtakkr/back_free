
@if(Auth::check())
    @include('layouts.partials.auth_header')
@else
    @include('layouts.partials.without_auth_header')
@endif

@yield('content')

@if(Auth::check())
   	@include('layouts.partials.auth_footer')
@else
   	@include('layouts.partials.without_auth_footer')
@endif



