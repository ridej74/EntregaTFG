@extends('layouts.app')

@section('navegacion')
    @include('ui.menu0')
@endsection

@section('content')
    <embed src="{{asset('storage/uploads/pdf/contacto.pdf')}}" type="application/pdf" width="100%" height="1000px" sm:height="800px" />
@endsection