@extends('layouts.app')

@section('navegacion')
    @include('ui.menu0')
@endsection

@section('content')
    <embed src="{{asset('storage/uploads/pdf/Normativa.Competiciones.pdf')}}" type="application/pdf" width="100%" height="1000px" />
@endsection