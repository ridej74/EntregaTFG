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
        <label for="titulo" class="block text-gray-700 text-sm mb-2">Titulo Noticia:</label>
        <input id="titulo" type="text" class="p-3 bg-white rounded form-input w-full @error('titulo') is-invalid @enderror" name="titulo" value="{{isset($noticia->titulo)? ($noticia->titulo): old('titulo')}}" placeholder="obligatorio" autocomplete="titulo" autofocus>
        @error('titulo')
            <span class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 w-full mt-5" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

        <label for="descripcion" class="mt-5 block text-gray-700 text-sm mb-2">Descripcion Noticia:</label>
        <input id="descripcion" value="{{isset($noticia->descripcion)? ($noticia->descripcion): old('descripcion')}}" type="hidden" class="p-3 bg--white rounded form-input w-full @error('descripcion') is-invalid @enderror" name="descripcion">
            <trix-editor class="p-3 bg-white" input = "descripcion" > </trix-editor > 
        @error('descripcion')
            <span class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 w-full mt-5" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        
        <label for="imagen" class="mt-5 block text-gray-700 text-sm mb-2">Imagenes:</label>
        {{isset($noticia->imagen)?($noticia->imagen):old('imagen')}}
        @if($modo == 'Editar')
            <img src="{{asset('storage/uploads/uploads-noticias/'.$noticia->id.'.jpg')}}" width="200" class="mt-5 mb-5 bg-green hover:underline"/>  
        @endif  
        <input id="imagen" type="file" name="imagen" class="p-3 bg-white rounded form-input w-full @error('imagen') is-invalid @enderror"  autocomplete="imagen" autofocus>
        @error('imagen')
            <span class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 w-full mt-5" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

        <button type="submit" class="mt-10 p-3 bg-blue-500 w-full hover:bg-indigo-600 text-white font-bold focus:outline focus:shadow-outline uppercase">{{$modo}} Noticia</button>
    </div>















