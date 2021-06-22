@extends('layouts.app')

@section('navegacion')
    @include('ui.menu6')
@endsection

@section('content')
@if(count($carreras)>0)

<div class="content mx-20 "> 
    <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <h1 class="mt-5 text-center text-3xl uppercase mb-5 p-3">{{__('Listado de Carreras')}}</h1>                                  
                    <!-- componente -->
                    <div class="flex items-center px-4">
                        <div class='overflow-x-auto w-full'>
                            <!-- Table -->
                            <table class='mx-auto max-w-4xl w-full whitespace-nowrap rounded-lg bg-white divide-y divide-gray-300 overflow-hidden'>
                                <thead class="bg-gray-50">
                                    <tr class="text-gray-600 text-left">
                                        <th class="font-semibold text-sm uppercase px-6 py-4">
                                            {{__('ID')}}
                                        </th>
                                        <th class="font-semibold text-sm uppercase px-6 py-4">
                                            {{__('Nombre')}}
                                        </th>
                                        <th class="font-semibold text-sm uppercase px-6 py-4 text-center">
                                            {{__('Provincia')}}
                                        </th>
                                        <th class="font-semibold text-sm uppercase px-6 py-4 text-center">
                                            {{__('Fecha')}}
                                        </th>
                                        <th class="font-semibold text-sm uppercase px-6 py-4 text-center">
                                            {{__('Acción')}}
                                        </th>
                                </thead>
                                <tbody class="divide-y divide-gray-200">
                                
                                    @foreach($carreras as $carrera)     
                                        <tr>
                                            <td class="px-6 py-4">
                                                {{$carrera->id}}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{$carrera->nombre}}
                                            </td>
                                            <td class="px-6 py-4 text-center">
                                                {{$carrera->provincia}}
                                            </td>
                                            <td class="px-6 py-4 text-center">
                                                {{($carrera->fecha)}}
                                            </td>
                                            <td class="flex flex-row px-6 py-4 justify-center">            
                                                <form action="{{route('carreras_vista',$carrera->id)}}">   
                                                    <button type="submit" class="mr-1 bg-transparent hover:bg-yellow-200 text-yellow-500 font-semibold hover:text-yellow-900 py-1 px-3 border border-yellow-900 hover:border-transparent rounded">     
                                                        Ver
                                                    </button>
                                                </form>
                                                <form action="{{route('Carreras.edit',$carrera->id)}}">
                                                    <button type="submit" class="mr-1 bg-transparent hover:bg-green-200 text-center text-green-500 font-semibold hover:text-green-900 py-1 px-2 border border-green-900 hover:border-transparent rounded">
                                                        Edit
                                                    </button>
                                                </form>
                                                <form action="{{route('Carreras.destroy',$carrera->id)}}" method="POST" >              
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-center bg-transparent hover:bg-red-200 text-red-500 font-semibold hover:text-red-900 py-1 px-1 border border-red-900 hover:border-transparent rounded" onclick="return confirm('¿Estas seguro de querer borrar el registro?');">Borrar</button> 
                                                </form> 
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
</div>

@else
    <div class="bg-red-50 p-4 rounded flex items-start text-red-600 my-4 shadow-lg mx-auto max-w-2xl">
        <div class="text-lg">
            <svg xmlns="http://www.w3.org/2000/svg" class="fill-current w-5 pt-1" viewBox="0 0 24 24"><path d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm4.597 17.954l-4.591-4.55-4.555 4.596-1.405-1.405 4.547-4.592-4.593-4.552 1.405-1.405 4.588 4.543 4.545-4.589 1.416 1.403-4.546 4.587 4.592 4.548-1.403 1.416z"/></svg>
        </div>
        <div class=" px-3">
            <h3 class="text-red-800 font-semibold tracking-wider">
                No hay ningún resultado que cumpla con los criterios de búsqueda establecidos
            </h3>
            <ul class="mt-5 text center list-disc list-inside">
                Ingrese unos nuevos filtros de búsqueda
            </ul>
        </div>
    </div>

@endif


    

    @if($carreras ?? ''->count())
    <div class="text-yellow mt-3">
        {{$carreras ?? ''->links()}}
    </div>
    @endif
@endsection

