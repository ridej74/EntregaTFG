<!-- Menú de navegación del show de carreras con botón para ver el mapa de carreras -->
<style>
    .scroll-hidden::-webkit-scrollbar {
      height: 0px;
      background: transparent; /* make scrollbar transparent */
    }
  </style>
  
  <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
  
  <header x-data="{ isOpen: false }" class="bg-white">
    <div class="shadow-lg">
    <nav class="mx-auto px-6 py-3">
        <div class="flex flex-col md:flex-row md:justify-between md:items-center">
            <div class="flex justify-between items-center">
                <div class="flex items-center">
                    <a class="text-gray-800 text-xl font-bold  hover:text-gray-700"><h1 class="leading-none text-2xl py-4 text-black">
                        <img class="gg-image-white inline" width="60" alt="Logo" src="{{asset('storage/uploads/icons-app/image.png')}}"/>
                    
                        @if (Auth::check())
                            <a class="inline md:text-3xl no-underline hover:text-teal-600 px-3" href="{{route('admin')}}">
                                {{ config('app.name','AragonTriatlon')}}
                            </a>
                        @else
                            <a class="inline md:text-3xl no-underline hover:text-teal-600 px-3" href="{{route('invitado')}}">
                                {{ config('app.name','AragonTriatlon')}}
                            </a>
                        @endif
                    </h1></a>
                </div>
        
                
                <div class="flex md:hidden">
                    <button @click="isOpen = !isOpen" type="button" class="text-gray-500 hover:text-gray-600 focus:outline-none focus:text-gray-600" aria-label="toggle menu">
                    <svg viewBox="0 0 24 24" class="h-6 w-6 fill-current">
                        <path fill-rule="evenodd" d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z"></path>
                    </svg>
                    </button>
                </div>
                </div>
        
                <div class="md:flex items-center" :class="isOpen ? 'block' : 'hidden'">
                <div class="flex flex-col text-center mt-2 md:flex-row md:mt-0 md:mx-1 ">
                    <a class="my-1 text-2xl mb-3 text-gray-700 leading-5 hover:text-blue-600 hover:underline md:mx-4 md:my-0" href="../atletas_clubes">Atletas</a>
                    <a class="my-1 text-2xl mb-3 text-gray-700 leading-5 hover:text-blue-600 hover:underline md:mx-4 md:my-0" href="../clubes">Clubes</a>
                    <a class="my-1 text-2xl mb-3 text-gray-700 leading-5 hover:text-blue-600 hover:underline md:mx-4 md:my-0" href="../carreras_clasificaciones">Carreras</a>
                    <a class="my-1 text-2xl text-gray-700 leading-5 hover:text-blue-600 hover:underline md:mx-4 md:my-0" href="../noticias">Noticias</a>
                    @if (Auth::check())
                        <a class="my-1 text-2xl text-gray-700 leading-5 hover:text-blue-600 hover:underline md:mx-4 md:my-0" href="../administracion">Administración</a>
                    @endif
                </div>
                <div class="flex flex-col mt-2 md:flex-row md:mt-0 md:mx-1">
                    <div class="flex flex-col md:flex-row md:ml-5 md:items-center py-2 md:mx-0 items-center">                          
                        <!-- modal div -->
                        <div x-data="{ open: false }">

                            <!-- Botón del modal de búsqueda -->
                            <button class="px-3 py-2 mx-auto text-2xl text-center font-semibold rounded border border-blue-800 bg-transparent hover:border-transparent md:text-2xl  text-blue-800 leading-5 hover:text-blue-900 hover:bg-blue-50 md:mx-0  select-none no-outline focus:shadow-outline" @click="open = true">Buscar Clubes </button>

                            <!-- Dialogo (pantalla) -->
                            <div class="absolute top-0 left-0 flex items-center justify-center w-full h-full" style="background-color: rgba(0,0,0,.5);" x-show="open"  >

                                <!-- Modal con el formulario de búsqueda-->
                                <div class="flex flex-row justify-between h-auto text-left bg-white rounded shadow-xl md:max-w-xl md:p-6 lg:p-8 " @click.away="open = false">
                                    <div class="flex flex-col text-center sm:mt-0">
                                        <div class="flex justify-between items-center">
                                            <div class="m-2 text-center sm:mt-6" >
                                                <h3 class="text-2xl px-4 font-medium leading-6 text-blue-900">
                                                Buscar Club
                                                </h3>
                                            </div>
                                            <div class="m-2 sm:mt-6">
                                                <span class=" w-full rounded-md shadow-sm">
                                                    <button @click="open = false" class="inline-flex justify-center w-full py-2 text-white bg-blue-500 rounded hover:bg-blue-700">
                                                        <svg
                                                            class="w-6 h-6"
                                                            fill="none"
                                                            stroke="currentColor"
                                                            viewBox="0 0 24 24"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                        >
                                                            <path
                                                            stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M6 18L18 6M6 6l12 12"
                                                            ></path>
                                                        </svg>
                                                    </button>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="m-2">
                                            @include('invitado.club.buscar')
                                        </div>
                                    </div>   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="flex">                      
                    <div class="mx-auto flex-col md:flex-row md:items-center py-2 md:mx-0">
                        <a class="block px-3 py-2 mx-1 rounded text-2xl text-center font-semibold md:text-2xl md:ml-6 bg-blue-500 text-white leading-5 hover:bg-blue-600 md:mx-0 md:w-auto" onclick="goBack()">
                            Volver
                        </a>
                    </div>
                </div>
            </div>
      </div>
  
      <script>
        function goBack() {
          window.history.back();
        }
        </script>
    </nav>
    </div>
  </header>