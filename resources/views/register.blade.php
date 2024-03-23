<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Register</title>
</head>
<body>
<div class="min-h-screen flex items-center justify-center w-full">
    <div class="bg-white shadow-md rounded-lg px-8 py-6 max-w-md">
        <h1 class="text-2xl font-bold text-center mb-4">Regístrate</h1>
        <form action="{{ route('register.post') }}" method="POST">
            @method("POST")
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Nombre</label>
                <input type="text" id="name" name="name" class="shadow-sm rounded-md w-full px-3 py-2 border" required>
            </div>
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Correo</label>
                <input type="email" id="email" name="email" class="shadow-sm rounded-md w-full px-3 py-2 border" required>
            </div>
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Contraseña</label>
                <input type="password" id="password" name="password" class="shadow-sm rounded-md w-full px-3 py-2 border" required>
            </div>
            <div class="mb-4">
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-2">Confirma tu Contraseña</label>
                <input type="password" id="password_confirmation" name="password_confirmation" class="shadow-sm rounded-md w-full px-3 py-2 border" required>
            </div>
            <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm">Crear Cuenta</button>
        </form>
    </div>
</div>
</body>
</html>

            