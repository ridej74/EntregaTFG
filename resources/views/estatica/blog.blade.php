@extends('layouts.app')

@section('navegacion')
    @include('ui.menu0')
@endsection

@section('content')

    <div class="w-auto mt-10 flex justify-center">
        <img alt="Logo" src="{{asset('storage/uploads/pdf/blog-en-construccion.jpg')}}"/>
    </div>
@endsection