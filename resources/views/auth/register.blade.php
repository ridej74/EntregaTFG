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
                        {{__('Register')}}
                    </div>
                        <form class="max-w-lg mx-auto my-5" method="POST" action="{{ route('register') }}" novalidate>
                            @csrf
    
                            <div class="mb-5">
                                <label for="name" class="block text-gray-700 text-xl sm:text-sm mb-2 mt-3">
                                    {{ __('Name') }}
                                </label>
                                <input id="name" type="text" 
                                class="p-3 bg-white rounded form-input w-full  @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus>

                                @error('name')
                                    <span class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 w-full mt-5" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
    
                            <div class="flex flex-wrap mb-6">
                                <label for="email" class="block text-gray-700 text-xl sm:text-sm mb-2 mt-3">{{ __('E-Mail Address') }}</label>
                                <input id="email" type="email" class="p-3 bg-white rounded form-input w-full  @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email">

                                @error('email')
                                    <span class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 w-full mt-5" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
    
                            <div class="flex flex-wrap mb-6">
                                <label for="password" class="block text-gray-700 text-xl sm:text-sm mb-2 mt-3">{{ __('Password') }}</label>
                                <input id="password" type="password" class="p-3 bg-white rounded form-input w-full  @error('password') is-invalid @enderror" name="password" autocomplete="new-password">
                                
                                @error('password')
                                    <span class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 w-full mt-5" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
    
                            <div class="flex flex-wrap mb-6">
                                <label for="password-confirm" class="block text-gray-700 text-xl sm:text-sm mb-2 mt-3">{{ __('Confirm Password') }}</label>
                                <input id="password-confirm" type="password" class="p-3 bg-white rounded form-input w-full" name="password_confirmation" autocomplete="new-password">
                            </div>
    
                            <div class="flex flex-wrap">
                                <button type="submit" 
                                class="mt-10 p-3 rounded-md bg-blue-900 w-full hover:bg-blue-600 text-white font-bold focus:outline focus:shadow-outline uppercase shadow-lg">
                                        {{ __('Register') }}
                                </button>
                            </div>
                        </form> 
                    </div>
                </div>
            </div>
    </div>
    </div>
</div>
@endsection
