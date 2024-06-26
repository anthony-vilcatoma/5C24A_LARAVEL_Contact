<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
        <!-- component -->
<link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/styles/tailwind.css">
<link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css">

</head>
<body>


<section class="py-1 bg-blueGray-50 h-screen">
<div class="w-full xl:w-8/12 mb-12 xl:mb-0 px-4 mx-auto mt-24">
  <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded ">
    <div class="rounded-t mb-0 px-4 py-3 border-0">
      <div class="flex flex-wrap items-center">
        <div class="relative w-full px-4 max-w-full flex-grow flex-1">
          <h3 class="font-semibold text-base text-blueGray-700">Contactos</h3>
        </div>
        <div class="relative w-full px-4 max-w-full flex-grow flex-1 text-right">
            {{-- <a href="{{ route('logout') }}" class="bg-indigo-500 text-white active:bg-indigo-600 text-xs font-bold uppercase px-3 py-1 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" role="button">Salir de la cuenta</a> --}}
            <a href="{{ route('contact.create') }}" class="bg-indigo-500 text-white active:bg-indigo-600 text-xs font-bold uppercase px-3 py-1 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" role="button">Añadir</a>
        </div>
        
      </div>
    </div>

    <div class="block w-full overflow-x-auto">
      <table class="items-center bg-transparent w-full border-collapse ">
        <thead>
          <tr>
            <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                          Nombre completo del contacto
                        </th>
          <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                          Numero Telefónico
                        </th>
           <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                          Acciones
                        </th>
       
          </tr>
        </thead>

        <tbody>
            @foreach ($contactos as $contacto )
                <th class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left text-blueGray-700 ">
                    {{$contacto->nombre}}  {{$contacto->apellido_paterno}}   {{$contacto->apellido_materno}} 
                </th>
                <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 ">
                    {{$contacto->numero}} 
                </td>
                <td class="border-t-0 px-6 align-center border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                    <div class="flex">
                        <a href="{{route('contact.edit',$contacto->id)}}" class="bg-blueGray-200 rounded-md p-2 text-black" > <button>editar</button></a>

                        <form method="POST" action="{{route('contact.destroy',$contacto->id)}}">
                            @method("DELETE")
                            @csrf
                            <button class="bg-blueGray-200 rounded-md p-2 text-black" type="submit">eliminar</button>

                        </form>


                    </div>
                </td>
            @endforeach
          <tr>
            
            
          </tr>
         
        
        </tbody>

      </table>
    </div>
  </div>
</div>

</section>
</body>
</html>