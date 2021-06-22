@extends('layouts.app')
@section('navegacion')
    @include('ui.menu0')
@endsection

@section('content')
    <div class="container w-auto h-auto mt-5">
        <div class="flex flex-col">

            <div class="mt-10 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">

                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">

                    <div class="border-blue-800 overflow-hidden sm:rounded-lg">
                        <div class="text-2xl  bg-blue-900 w-full rounded-md text-white text-center font-semibold p-5 border border-line mx-auto max-w-lg shadow-lg">
                            {{('Login')}}
                        </div>  

                        <form class="max-w-lg mx-auto my-5"  method="POST" action="{{ route('login') }}" novalidate>
                            @csrf

                            <div class="mb-5">
                                <label for="email" class="block text-gray-700 text-xl sm:text-sm mb-2 mt-3">{{ __('E-Mail Address') }}</label>

                                <input id="email" type="email" class="p-3 bg-white rounded form-input w-full @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" autofocus>

                                @error('email')
                                    <span class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 w-full mt-5" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                
                            </div>

                            <div class="flex flex-wrap mb-6">
                                <label for="password" class="block text-gray-700 text-xl sm:text-sm mb-2 mt-3">{{ __('Password') }}</label>

                                    <input id="password" type="password" class="p-3 bg-white rounded form-input w-full @error('password') is-invalid @enderror" name="password" autocomplete="current-password">

                                    @error('password')
                                        <span class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 w-full mt-5" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>

                            <div class="flex flex-wrap mb-6">
                                <input class="mr-2" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="block text-gray-900 text-xl sm:text-sm mb-2 mt-3" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>

                            <div class="flex flex-wrap">
                                <button 
                                        type="submit" 
                                        class="mt-10 p-3 rounded-md bg-blue-900 w-full hover:bg-blue-600 text-white font-bold focus:outline focus:shadow-outline uppercase shadow-lg">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="text-sm text-gray-500 mt-5 text-center w-full" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </form>
                    </div>    
                </div>
            </div>
        </div>       
    </div>
@endsection
<!-- component -->





