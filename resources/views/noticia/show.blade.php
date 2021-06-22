@extends('layouts.app')

@section('styles')
@section('navegacion')
    @include('ui.menu')
@endsection

@section('content')

<!-- component -->
<!-- This is an example component -->
<div class="m-auto px-4 py-8 max-w-xl">
    <div class="bg-white p-3 rounded shadow-2xl" >
        <div>
            <img class="w-full" src="{{asset('storage/uploads/uploads-noticias/'.$noticias->id.'.jpg')}}">
        </div>
        <div class="px-4 py-2 mt-2 bg-white">
            <h2 class="font-bold text-2xl text-gray-800"><h2 class="font-bold text-2xl text-gray-800">{{$noticias->titulo}}</h2></h2>
                <p class="sm:text-sm text-xs text-gray-700 px-2 mr-1 my-3">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora reiciendis ad architecto at aut placeat quia, minus dolor praesentium officia maxime deserunt porro amet ab debitis deleniti modi soluta similique...
                </p>
            <div class="user flex items-center -ml-3 mt-8 mb-4">
                <span class="pl-40 font-bold">Autor: </span><p class="p-2"> {{$noticias->user->name}}</p>        
            </div>
        </div>
    </div>
</div>


  @endsection