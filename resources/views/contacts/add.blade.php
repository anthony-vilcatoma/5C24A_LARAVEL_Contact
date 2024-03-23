<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>

    <title>Añadir</title>
</head>
<body>
    <!-- component -->
<div class="bg-gray-100 flex items-center justify-center h-screen">
    <div class="bg-white p-8 rounded-lg shadow-lg max-w-sm w-full">
        <div class="flex justify-center mb-6">
            <span class="inline-block bg-gray-200 rounded-full p-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M12 4a4 4 0 0 1 4 4a4 4 0 0 1-4 4a4 4 0 0 1-4-4a4 4 0 0 1 4-4m0 10c4.42 0 8 1.79 8 4v2H4v-2c0-2.21 3.58-4 8-4"/></svg>
            </span>
        </div>
        <h2 class="text-2xl font-semibold text-center mb-4">Crear un nuevo Contacto</h2>
        <form action="{{route('contact.store')}}" method="POST">
            @method("POST")
            @csrf
            <div class="mb-4">
                <label for="fullName" class="block text-gray-700 text-sm font-semibold mb-2">Nombres</label>
                <input type="text" id="fullName" name="name" class="form-input w-full px-4 py-2 border rounded-lg text-gray-700 focus:ring-blue-500" required placeholder="Nombres Completos">
            </div>
            <div class="mb-4">
                <label for="ape_paterno" class="block text-gray-700 text-sm font-semibold mb-2">Apellido Paterno</label>
                <input type="text" id="ape_paterno" name="ape_paterno" class="form-input w-full px-4 py-2 border rounded-lg text-gray-700 focus:ring-blue-500" required placeholder="Apellido Paterno">
            </div>
            <div class="mb-6">
                <label for="ape_materno" class="block text-gray-700 text-sm font-semibold mb-2">Apellido Materno</label>
                <input type="text" id="ape_materno"  name="ape_materno"  class="form-input w-full px-4 py-2 border rounded-lg text-gray-700 focus:ring-blue-500" required placeholder="Apellido Materno">
            </div>
            <div class="mb-6">
                <label for="telefono" class="block text-gray-700 text-sm font-semibold mb-2">Telefono</label>
                <input type="text" id="telefono"  name="telefono" class="form-input w-full px-4 py-2 border rounded-lg text-gray-700 focus:ring-blue-500" required placeholder="Telefono">
            </div>

            <button type="submit" class="w-full bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">Añadir a tu agenda</button>
            
        </form>
    </div>
</div>
</body>
</html>