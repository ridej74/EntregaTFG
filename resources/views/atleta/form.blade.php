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
<label for="sexo" class="block text-gray-700 text-xl sm:text-sm mb-2 mt-3">Sexo Atleta:</label>
@if($modo == 'Editar')
    <select name="sexo" id="sexo" class="p-3 bg-white rounded form-input w-full" autocomplete="sexo" autofocus>
        <option value="">Elija una opción</option>
        <option value="M" {{ old('sexo',$atleta->sexo)=='M' ? 'selected' : ''  }}>Masculino</option>
        <option value="F" {{ old('sexo',$atleta->sexo)=='F' ? 'selected' : ''  }}>Femenino</option>
    </select>
@else  
    <select name="sexo" id="sexo" class="p-3 bg-white rounded form-input w-full" autocomplete="sexo" autofocus>
        <option value="">Elija una opción</option>
        <option value="M" {{ old('sexo')=='M' ? 'selected' : ''  }}>Masculino</option>
        <option value="F" {{ old('sexo')=='F' ? 'selected' : ''  }}>Femenino</option>
    </select>
@endif

<div class="mb-5">
<label for="nombre" class="block text-gray-700 text-xl sm:text-sm mb-2 mt-3">Nombre Atleta:</label>
<input id="nombre" type="text" class="p-3 bg-white rounded form-input w-full @error('nombre') is-invalid @enderror" name="nombre" value="{{isset($atleta->nombre)? ($atleta->nombre): old('nombre')}}" placeholder="obligatorio" autocomplete="nombre" autofocus>
@error('nombre')
<span class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 w-full mt-5" role="alert">
    <strong>{{ $message }}</strong>
</span>
@enderror

    
<div class="mb-5">
<label for="apellido_1" class="block text-gray-700 text-xl sm:text-sm mb-2 mt-3">Primer Apellido Atleta:</label>
<input id="apellido_1" type="text" class="p-3 bg-white rounded form-input w-full @error('apellido_1') is-invalid @enderror" name="apellido_1" value="{{isset($atleta->apellido_1)? ($atleta->apellido_1): old('apellido_1')}}" placeholder="obligatorio" autocomplete="apellido_1" autofocus>
@error('apellido_1')
<span class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 w-full mt-5" role="alert">
    <strong>{{ $message }}</strong>
</span>
@enderror

<div class="mb-5">
<label for="apellido_2" class="block text-gray-700 text-xl sm:text-sm mb-2 mt-3">Segundo Apellido Atleta:</label>
<input id="apellido_2" type="text" class="p-3 bg-white rounded form-input w-full @error('apellido_2') is-invalid @enderror" name="apellido_2" value="{{isset($atleta->apellido_2)? ($atleta->apellido_2): old('nombre')}}" placeholder="obligatorio" autocomplete="apellido_2" autofocus>
@error('apellido_2')
<span class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 w-full mt-5" role="alert">
    <strong>{{ $message }}</strong>
</span>
@enderror

<button type="submit" class="mt-10 p-3 bg-blue-500 w-full hover:bg-indigo-600 text-white font-bold focus:outline focus:shadow-outline uppercase">{{$modo}} Atleta</button>
</div>


