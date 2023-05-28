<x-guest-layout>
  <x-auth-card>
    <x-slot name="logo">
    <!--<a href="/">-->
    <!--    <x-application-logo class="w-20 h-20 fill-current text-gray-500" />-->
    <!--</a>-->
    <div class="logo" style=" width: 35%; margin: 0px auto;">
        <a href="{{route('index')}}">
            <img src="{{URL::to('/')}}/public/logo.png" alt="Logo">
        </a>
    </div>
    </x-slot>
    <x-auth-validation-errors class="mb-4" :errors="$errors" />
    @if($error=Session::get('error'))
    <div class="alert alert-danger">
      <p>{{ $error }}</p>
    </div>
    @endif<br>
    
    <form method="POST" action="{{ route('register') }}">
      @csrf
      
      <div>
        <x-label for="username" :value="__('Username')" />
        <x-input id="username" class="block mt-1 w-full" type="text" name="username" :value="old('username')"  autofocus />
      </div>
      <div class="mt-4">
        <x-label for="email" :value="__('Email')" />
        <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"  />
      </div>
      <div class="mt-4">
        <x-label for="password" :value="__('Password')" />
        <x-input id="password" class="block mt-1 w-full" type="password" name="password"  autocomplete="new-password" />
      </div>
      <div class="mt-4">
        <x-label for="password_confirmation" :value="__('Confirm Password')" />
        <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation"  />
      </div><br>
	  
      <div class="flex items-center justify-end mt-4"> <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">{{ __('Already registered?') }}</a>
        <x-button class="ml-4" style="background-color:#7ddcfa !important;">{{ __('Register') }}</x-button>
      </div>
    </form>
    </x-auth-card>
</x-guest-layout>
