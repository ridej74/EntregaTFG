@extends('layouts.app')

@section('styles')
@endsection

@section('navegacion')
    @include('ui.menu1')
@endsection

@section('content')

<!-- component -->

    <section class="bg-blue-500 md:bg-white text-gray-700 max-w-screen-2xl mx-auto">
        <div class="container grid grid-cols-1 md:grid-cols-2 md:gap-5 shadow-lg">
        @foreach($pruebas as $prueba)
            <div class="container mx-auto md:w-full mt-5 md:m-5 items-center p-8 bg-white md:rounded-l">
                <div class="title text-center bg-white p-8 text-3xl md:text-5xl h-auto">
                    <p class="font-bold">{{$atleta->nombre}} {{$atleta->apellido_1}} {{$atleta->apellido_2}}</p>
                </div>
                <div class="flex center">
                    <div class="mx-auto">
                        <img src="{{asset('storage/uploads/uploads-club/'.$prueba->id.'.jpg')}}" class="rounded-full" alt=""/>
                    </div>
                </div>
                <h1 class="text-indigo-500 font-semibold text-center text:2xl md:text-4xl my-4 pb-5">{{$prueba->nombre}}</h1>
                <p class="mx-auto text-justify px-8 mb-8 ">
                    <h3 class="font-bold text-xl text-center text-gray-500 md:text-3xl ">Sexo</h3>
                    <p class="ml-2 mb-15 mt-5 text-center text-xl md:text-2xl">
                        @switch($atleta->sexo)
                            @case('M')
                                {{'Masculino'}}
                                @break
                            @default
                                {{'Femenino'}}
                                @break
                        @endswitch
                    </p>	
                    <h3 class="font-bold text-center text-xl text-gray-500 md:text-3xl ">Categoría</h3>
                    <p class="mx-auto text-center ml-2 mb-15 mt-5 text-xl md:text-2xl"> 
                        
                        @foreach($clases as $clase)
                    
                        @endforeach 

                        @switch($clase->pivot->categoria)
                            @case('ABSM')
                                {{'Absoluta Masculino'}}
                                @break
                            @case('V1M')
                                {{'Veterano 1 Masculino'}}
                                @break
                            @case('V2M')
                                {{'Veterano 2 Masculino'}}
                                @break
                            @case('V3M')
                                {{'Veterano 3 Masculino'}}
                                @break
                            @case('SUB23M')
                                {{'SUB23 Masculino'}}
                                @break
                            @case('JNM')
                                {{'Junior Masculino'}}
                                @break
                            @case('CDM')
                                {{'Cadete Masculino'}}
                                @break
                            @case('JNF')
                                {{'Junior Femenina'}}
                                @break
                            @case('ABSF')
                                {{'Absoluta Femenina'}}
                                @break
                            @case('V1F')
                                {{'Veterano 1 Femenina'}}
                                @break
                            @case('V2F')
                                {{'Veterano 2 Femenina'}}
                                @break
                            @case('V3F')
                                {{'Veterano 3 Femenina'}}
                                @break
                            @case('SUB23F')
                                {{'SUB23 Femenina'}}
                                @break
                            @default
                                {{'Cadete Femenina'}}
                                @break
                        @endswitch
                    </p>
                    <h3 class="font-bold text-center text-xl md:text-3xl text-gray-500 ">Pruebas disputadas</h3>
                    <p class="ml-2 mb-5 mt-5 text-center text-xl md:text-2xl"> 
                        {{$clases->count()}}
                    </p>
                    <p>
                        @php
                            $podios_categoria=0;
                            $podios_total=0;
                        @endphp
                        @foreach($clases as $clase)
                            @if($clase->pivot->posicion_categoria <= 3)
                                @php
                                    $podios_categoria++;
                                @endphp
                            @endif
                            @if($clase->pivot->posicion_total <= 3)
                                @php
                                    $podios_total++;
                                @endphp
                            @endif
                        @endforeach 
                      
                        <h3 class="font-bold text-center text-xl md:text-3xl text-gray-500 ">Nº Podios en clasificación general</h3>
                            <p class="ml-2 mb-5 mt-5 text-center text-xl md:text-2xl"> 
                                {{$podios_total}}
                            </p>
                        <h3 class="font-bold text-center text-xl md:text-3xl text-gray-500">Nº Podios en su categoria</h3>
                            <p class="ml-2 text-center mb-5 mt-5 text-xl md:text-2xl"> 
                                {{$podios_categoria}}
                            </p>  
                    </p>   
                    @php
                        $podios_totales=0;
                        $podios_categoria=0;
                        $puntos=0;
                        $i=0;
                        $j=0;
                        $array_pruebas=array();
                        $array=array();
                        $array[0]=0;
                        $array[1]=0;
                        $array[2]=0;
                        $array[3]=0;
                        $array[4]=0;
                        $array[5]=0;
                        $array[6]=0;
                        $array[7]=0;
                        $puntos_totales=0;
                    @endphp
                    @foreach($clases as $clase) 
                        @php
                            $puntos_totales=$puntos_totales+$clase->pivot->puntos;
                            $array[($clase->id)-1]=$clase->pivot->puntos;
                        @endphp
                    @endforeach 
                    @php
                        $puntos_top6=0;
                        rsort($array);
                        for($k=0; $k<8; $k++){
                            if($k<6)
                                $puntos_top6=$puntos_top6+$array[$k];             
                        }
                    @endphp
                    <div class="md:mx-auto border-2 rounded-lg shadow-lg border-gray-300">
                        <div class="border-2 border-gray-300 p-5 rounded-md px-3">
                                <h2 class="font-bold text-xl text-center md:text-3xl text-gray-500 mt-8 mb-2">
                                <img alt="ranking" class="mb-3 p-3 mx-auto md:align-items-center" src="{{asset('storage/uploads/icons-app/ranking.png')}}" style="height: 100px;"/>
                                Puntuaciones
                            </h2>
                        </div>
                        <div class="max-w-2x m-1 bg-white  tracking-wide shadow-lg">
                            <div id="header">  
                                <div class="flex-col center p-3  md:border md:border-gray-200">
                                    <h4 class="font-bold text-xl text-center md:text-3xl text-gray-500">Total</h4>
                                    <p class="text-gray-800 text-2xl mt-2 text-center">{{$puntos_totales}}</p>
                                </div>
                                <div class="flex-col center p-3 md:mt-2 md:border md:border-gray-200">
                                    <h4 class="font-bold text-xl md:text-3xl text-center text-gray-500">Top 6</h4>
                                    <p class="text-gray-800 text-2xl mt-2 text-center">{{$puntos_top6}}</p>  
                                </div>
                            </div>
                        </div>  
                    </div>                   
                </p>
            </div>

            
            <div class="container flex flex-col mx-auto md:rounded-r bg-white md:mt-5 m-5">
                <div class="bg-white rounded p-4 shadow-lg mb-4 md:mt-15 md:mx-auto">                    
                    <div class="mb-2 pb-2">
                        <h3 class="font-bold text-3xl p-2 mb-2 text-center text-gray-600">Participaciones</h3>
                        <p class="font-bold text-3xl p-2 mb-2  text-gray-500">Porcentaje de carreras disputadas</p>
                    </div>
                    <div id="donutchart" style="width: auto; "></div>
                </div>

                <div class=" bg-white rounded p-4 items-center m-5 mx-auto" >
                    <h3 class="bg-white font-bold text-3xl text-center p-2 mb-2">Pruebas y Puntuaciones</h3>
                    <!-- Table -->
                    <table class='rounded-lg bg-white divide-y divide-gray-300'>
                        <thead class="bg-gray-50">
                            <tr class="text-gray-600 text-center">
                                <th class="font-semibold text-sm uppercase px-6 py-4 text-center">
                                    Prueba
                                </th>
                                <th class="font-semibold text-sm uppercase px-6 py-4 text-center">
                                    Posicion General
                                </th>
                                <th class="font-semibold text-sm uppercase px-6 py-4 text-center">
                                    Posicion Categoria
                                </th>
                                <th class="font-semibold text-sm uppercase px-6 py-4 text-center">
                                    Puntos
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            
                            @foreach($clases as $clase) 
                                <tr>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center space-x-3">
                                            {{$clase->nombre}}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 ">
                                        @if($clase->pivot->posicion_total <= 3)
                                                @php
                                                    $podios_totales++;
                                                @endphp
                                            @switch($clase->pivot->posicion_total)
                                                @case(1)
                                                <img class="gg-image-white inline" width="60" alt="Logo" src="{{asset('storage/uploads/icons-app/copaprimero.png')}}"/>
                        
                                                    @break
                                                @case(2)
                                                <img class="gg-image-white inline" width="60" alt="Logo" src="{{asset('storage/uploads/icons-app/copasegundo.png')}}"/>
                        
                                                    @break
                                                @case(3)
                                                <img class="gg-image-white inline" width="60" alt="Logo" src="{{asset('storage/uploads/icons-app/copatercero.png')}}"/>
                        
                                                @break
                                                @default
                                                    @break
                                            @endswitch
                                        @else
                                            {{$clase->pivot->posicion_total}}
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        @if($clase->pivot->posicion_categoria <= 3)
                                            @php
                                                $podios_categoria++;
                                            @endphp
                                            @switch($clase->pivot->posicion_categoria)
                                                @case(1)
                                                <img class="gg-image-white inline" width="60" alt="Logo" src="{{asset('storage/uploads/icons-app/primero.png')}}"/>
                        
                                                    @break
                                                @case(2)
                                                <img class="gg-image-white inline" width="60" alt="Logo" src="{{asset('storage/uploads/icons-app/segundo.png')}}"/>
                        
                                                    @break
                                                @case(3)
                                                <img class="gg-image-white inline" width="60" alt="Logo" src="{{asset('storage/uploads/icons-app/tercero.png')}}"/>
                        
                                                @break
                                                @default
                                                    @break
                                            @endswitch
                                        @else
                                            {{$clase->pivot->posicion_categoria}}
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        <span class="text-green-800 bg-green-200 font-semibold px-2 rounded-full">
                                            @php
                                                $puntos_totales=$puntos_totales+$clase->pivot->puntos;
                                                $array[($clase->id)-1]=$clase->pivot->puntos;
                                            @endphp
                                            {{$clase->pivot->puntos}}
                                        </span>
                                    </td>
                                </tr>
                            @endforeach 
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @endforeach
    </section>
@endsection

@section('scripts')      
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
    google.charts.load("current", {packages:["corechart"]});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
        var data = google.visualization.arrayToDataTable([
        ['Task', 'Hours per Day'],
        ['Disputadas',  {{$clases->count()}}   ],
        ['Sin disputar',   {{8 - $clases->count()}}   ]
        ]);

        var options = {
        title: 'Participación Pruebas Campeonato',
        pieHole: 0.5,
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart.draw(data, options);
    }
    </script>
@endsection   


