@if(count($errors)>0)
<div class="bg-red-100 mb-3 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
   <ul>
        @foreach ($errors->all() as $error)
            <li class="m-2" >{{ $error }}</li>
        @endforeach
   </ul>
</div>
@endif

<div class="mb-5">
    <label for="nombre" class="block text-gray-700 text-sm mb-2 mt-3">Nombre:</label>
    <input id="nombre" type="text" class="p-3 bg-white rounded form-input w-full @error('nombre') is-invalid @enderror" name="nombre" value="{{isset($carrera->nombre)? ($carrera->nombre): old('nombre')}}" placeholder="obligatorio" autocomplete="nombre" autofocus>
    @error('nombre')
        <span class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 w-full mt-5" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror   
</div>

<div class="mb-5">
    <label for="modalidad" class="block text-gray-700 text-sm mb-2 mt-3">Modalidad:</label>
    @if($modo == 'Editar')
        <select name="modalidad" id="modalidad" class="p-3 bg-white rounded form-input w-full"  autocomplete="modalidad" autofocus>
            <option value="">Elija una opción</option>
            <option value="Duatlon_Individual" {{ old('modalidad',$carrera->modalidad)=='Duatlon' ? 'selected' : ''  }}>Duatlon individual</option>
            <option value="Duatlon_Equipos" {{ old('modalidad',$carrera->modalidad)=='Duatlon_Equipos' ? 'selected' : ''  }}>Duatlon por equipos</option>
            <option value="Triatlon_Individual" {{ old('modalidad',$carrera->modalidad)=='Triatlon_Individual' ? 'selected' : ''  }}>Triatlon individual</option>
            <option value="Triatlon_Equipos" {{ old('modalidad',$carrera->modalidad)=='Triatlon_Equipos' ? 'selected' : ''  }}>Triatlon por equipos</option>
        </select>
    @else     
        <select name="modalidad" id="modalidad" class="p-3 bg-white rounded form-input w-full"  autocomplete="modalidad" autofocus>
            <option value="">Elija una opción</option>
            <option value="Duatlon_Individual" {{ old('modalidad')=='Duatlon' ? 'selected' : ''  }}>Duatlon individual</option>
            <option value="Duatlon_Equipos" {{ old('modalidad')=='Duatlon_Equipos' ? 'selected' : ''  }}>Duatlon por equipos</option>
            <option value="Triatlon_Individual" {{ old('modalidad')=='Triatlon_Individual' ? 'selected' : ''  }}>Triatlon individual</option>
            <option value="Triatlon_Equipos" {{ old('modalidad')=='Triatlon_Equipos' ? 'selected' : ''  }}>Triatlon por equipos</option>
        </select>
    @endif
</div>

<div class="mb-5">
    <label for="competicion" class="block text-gray-700 text-sm mb-2 mt-3">Competicion:</label>
    @if($modo == 'Editar')
        <select name="competicion" id="sexo"class="p-3 bg-white rounded form-input w-full"  autocomplete="competicion" autofocus>
            <option value="">Elija una opción</option>
            <option value="Copa Aragonesa de Duatlón Cros" {{ old('provincia',$carrera->competicion)=='Copa Aragonesa de Duatlón Cros' ? 'selected' : ''  }}>Copa Aragonesa de Duatlón Cros</option>
        </select>
    @else     
        <select name="competicion" id="sexo"class="p-3 bg-white rounded form-input w-full"  autocomplete="competicion" autofocus>
            <option value="">Elija una opción</option>
            <option value="Copa Aragonesa de Duatlón Cros" {{ old('provincia')=='Copa Aragonesa de Duatlón Cros' ? 'selected' : ''  }}>Copa Aragonesa de Duatlón Cros</option>
        </select>
    @endif
</div>

<div class="mb-5">
    <label for="localidad" class="block text-gray-700 text-sm mb-2 mt-3">Localidad:</label>
    <input id="localidad" type="text" class="p-3 bg-white rounded form-input w-full @error('localidad') is-invalid @enderror" name="localidad" value="{{isset($carrera->localidad)? ($carrera->localidad): old('localidad')}}" placeholder="obligatorio" autocomplete="localidad" autofocus>
    @error('localidad')
        <span class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 w-full mt-5" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="mb-5">
    <label for="provincia" class="block text-gray-700 text-sm mb-2 mt-3">Provincia:</label>
    @if($modo == 'Editar')
        <select name="provincia" id="provincia"class="p-3 bg-white rounded form-input w-full"  autocomplete="provincia" autofocus>
            <option value="">Elija una opción</option>
            <option value="Huesca" {{ old('provincia',$carrera->provincia)=='Huesca' ? 'selected' : ''  }}>Huesca</option>
            <option value="Teruel" {{ old('provincia',$carrera->provincia)=='Teruel' ? 'selected' : ''  }}>Teruel</option>
            <option value="Zaragoza" {{ old('provincia',$carrera->provincia)=='Zaragoza' ? 'selected' : ''  }}>Zaragoza</option>
        </select>
    @else  
        <select name="provincia" id="provincia"class="p-3 bg-white rounded form-input w-full"  autocomplete="provincia" autofocus>
            <option value="">Elija una opción</option>
            <option value="Huesca" {{ old('provincia')=='Huesca' ? 'selected' : ''  }}>Huesca</option>
            <option value="Teruel" {{ old('provincia')=='Teruel' ? 'selected' : ''  }}>Teruel</option>
            <option value="Zaragoza" {{ old('provincia')=='Zaragoza' ? 'selected' : ''  }}>Zaragoza</option>
        </select>
    @endif
</div>

<div class="mb-5">
    <label for="fecha"  class="block text-gray-700 text-sm mb-2 mt-3">Fecha:</label>
    <input id="fecha" width="276"type="text" class="p-3 bg-white rounded form-input w-full @error('fecha') is-invalid @enderror" name="fecha" value="{{isset($carrera->fecha)? ($carrera->fecha): old('fecha')}}" placeholder="obligatorio" autocomplete="fecha" autofocus>
    @error('fecha')
        <span class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 w-full mt-5" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="mb-5">
    <label for="distancia_1" class="block text-gray-700 text-sm mb-2 mt-3">Distancia Carrera primer sector (en KM):</label>
    <input id="distancia_1" type="text" class="p-3 bg-white rounded form-input w-full @error('distancia_1') is-invalid @enderror" name="distancia_1" value="{{isset($carrera->distancia_1)? ($carrera->distancia_1): old('distancia_1')}}" placeholder="obligatorio" autocomplete="distancia_1" autofocus>
    @error('distancia_1')
        <span class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 w-full mt-5" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="mb-5">
    <label for="distancia_2" class="block text-gray-700 text-sm mb-2 mt-3">Distancia Carrera segundo sector (en KM):</label>
    <input id="distancia_2" type="text" class="p-3 bg-white rounded form-input w-full @error('distancia_2') is-invalid @enderror" name="distancia_2" value="{{isset($carrera->distancia_2)? ($carrera->distancia_2): old('distancia_2')}}" placeholder="obligatorio" autocomplete="distancia_2" autofocus>
    @error('distancia_2')
        <span class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 w-full mt-5" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="mb-5">
    <label for="distancia_3" class="block text-gray-700 text-sm mb-2 mt-3">Distancia Carrera tercer sector (en KM):</label>
    <input id="distancia_3" type="text" class="p-3 bg-white rounded form-input w-full @error('distancia_3') is-invalid @enderror" name="distancia_3" value="{{isset($carrera->distancia_3)? ($carrera->distancia_3): old('distancia_3')}}" placeholder="obligatorio" autocomplete="distancia_3" autofocus>
    @error('distancia_3')
        <span class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 w-full mt-5" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="mb-5">
    <label for="juez_arbitro" class="block text-gray-700 text-sm mb-2 mt-3">Nombre Juez Arbitro:</label>
    <input id="juez_arbitro" type="text" class="p-3 bg-white rounded form-input w-full @error('juez_arbitro') is-invalid @enderror" name="juez_arbitro" value="{{isset($carrera->juez_arbitro)? ($carrera->juez_arbitro): old('juez_arbitro')}}" placeholder="obligatorio" autocomplete="juez_arbitro" autofocus>
    @error('juez_arbitro')
        <span class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 w-full mt-5" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<button type="submit" class="mt-10 p-3 bg-blue-500 w-full hover:bg-indigo-600 text-white font-bold focus:outline focus:shadow-outline uppercase">{{$modo}} Carrera</button>
</div>