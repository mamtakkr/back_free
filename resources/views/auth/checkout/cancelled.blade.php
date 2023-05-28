<!-- Bootstrap -->
<link href="{{URL::to('/')}}/public/front/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<x-guest-layout>
<x-auth-card>
<x-slot name="logo">
<!--{{--<div class="auth_login"> <a href="{{route('index')}}"> <img alt="" src="{{URL::to('/')}}/public/images/settings/{{get_setting('logo')}}" srcset="{{URL::to('/')}}/public/images/settings/{{get_setting('logo')}}" style="width: 60% !important; margin: 13px auto 0px !important;" > </a> </div>--}}-->
</x-slot>
<x-auth-validation-errors class="mb-4" :errors="$errors" />
<div>
  <h5 class="mt-4 text-center">{{ __('public.Payment_cancelled') }}</h5>
  <p class="text-center text-muted">{{ __('public.payment_was_cancelled.') }}</p>
  <div class="text-center mt-5"> <a href="{{ url('/') }}" class="btn btn-primary">{{ __('public.Back_Home') }}</a> </div>
</div>
</x-auth-card>
</x-guest-layout>
