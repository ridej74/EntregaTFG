@extends('layouts.app')

@section('navegacion')
    @include('ui.menu5')
  
@endsection

@section('content')

<div class="overflow-auto sm:overflow-visible md:overflow-hidden lg:overflow-x-scroll xl:overflow-y-scroll ...">
    <div class="container mx-auto mt-5 text-center">
        @if(Session::has('mensaje'))
        <div class="flex w-full max-w-sm mx-auto overflow-hidden bg-white rounded-lg shadow-md dark:bg-gray-800">
            <div class="flex items-center justify-center w-12 bg-green-500">
                <svg class="w-6 h-6 text-white fill-current" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg">
                    <path d="M20 3.33331C10.8 3.33331 3.33337 10.8 3.33337 20C3.33337 29.2 10.8 36.6666 20 36.6666C29.2 36.6666 36.6667 29.2 36.6667 20C36.6667 10.8 29.2 3.33331 20 3.33331ZM16.6667 28.3333L8.33337 20L10.6834 17.65L16.6667 23.6166L29.3167 10.9666L31.6667 13.3333L16.6667 28.3333Z"/>
                </svg>
            </div>
                <div class="px-4 py-2 -mx-3">
                    <div class="mx-3">
                        
                        <p class="font-bold">
                        <span class="font-semibold text-green-500 dark:text-green-400">Todo correcto</span><br>
                                {{Session::get('mensaje')}}
                        </p>
                    </div>
                </div>
            @endif
        </div>
        <div class="content mx-20 "> 
            <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <h1 class="mt-5 text-center text-3xl uppercase mb-5 p-3">{{__('Listado de entrada de Clubes')}}</h1>                                       
                            <!-- componente -->
                            <div class="flex items-center px-4">
                                <div class='overflow-x-auto w-full'>

                                    <!-- Tabla -->
                                    <table class='mx-auto max-w-4xl w-full whitespace-nowrap rounded-lg bg-white divide-y divide-gray-300 overflow-hidden'>
                                        <thead class="bg-gray-50">
                                            <tr class="text-gray-600 text-left">
                                                <th class="font-semibold text-sm uppercase px-6 py-4 text-center">
                                                    {{__('ID')}}
                                                </th>
                                                <th class="font-semibold text-sm uppercase px-6 py-4 text-center">
                                                    {{__('Nombre')}}
                                                </th>
                                                <th class="font-semibold text-sm uppercase px-6 py-4 text-center">
                                                    {{__('Logo')}}
                                                </th>
                                                <th class="font-semibold text-sm uppercase px-6 py-4 text-center">
                                                    {{__('Alta')}}
                                                </th>
                                                <th class="font-semibold text-sm uppercase px-6 py-4 text-center">
                                                    {{__('Acciones')}}
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody class="divide-y divide-gray-200">

                                            @foreach($clubs as $club) 
                                                <tr>
                                                    <td class="px-6 py-4 text-center">
                                                        {{$club->id}}
                                                    </td>
                                                    <td class="px-6 py-4 text-center">
                                                        {{$club->nombre}}
                                                    </td>
                                                    <td class="px-6 py-4 text-center">
                                                        <img src="{{asset('storage/uploads/uploads-club/'.$club->id.'.jpg')}}" width="70" class="bg-green hover:underline"/>
                                                    </td>
                                                    <td class="px-6 py-4 text-center">
                                                        {{($club->created_at)->format('d-m-Y')}}
                                                    </td>
                                                    <td class="flex flex-row px-6 py-4 justify-center">
                                                        <div class="inline">
                                                        <form action="{{route('Clubs.show',$club->id)}}">  
                                                            <button type="submit" class="mr-1 bg-transparent hover:bg-yellow-200 text-yellow-500 font-semibold hover:text-yellow-900 py-1 px-3 border border-yellow-900 hover:border-transparent rounded">     
                                                                Ver
                                                            </button>
                                                        </form>
                                                        </div>
                                                        <div class="inline">
                                                        <form action="{{route('Clubs.edit',$club->id)}}">
                                                            <button type="submit" class="mr-1 bg-transparent hover:bg-green-200 text-center text-green-500 font-semibold hover:text-green-900 py-1 px-2 border border-green-900 hover:border-transparent rounded">
                                                                Edit
                                                            </button>
                                                        </form>
                                                        </div>
                                                        <div class="inline">
                                                        <form action="{{route('Clubs.destroy',$club->id)}}" method="POST" >              
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="text-center bg-transparent hover:bg-red-200 text-red-500 font-semibold hover:text-red-900 py-1 px-1 border border-red-900 hover:border-transparent rounded" onclick="return confirm('¿Estas seguro de querer borrar el registro?');">Borrar</button> 
                                                        </form> 
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    @if($clubs ?? ''->count())
        <div class="text-yellow mt-3">
            {{$clubs ?? ''->links()}}
        </div>
    @endif
@endsection



