<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @include('layouts.sidebar')

</head>
<body class="font-sans antialiased">

    <div class="min-h-screen bg-gray-100 flex">
        <!-- Sidebar -->
        <aside class="w-1/5"></aside>

        <!-- Page Content -->
        <main class="flex-1 p-4 mt-20">
            <div class="container mx-auto py-8">
                <h1 class="text-3xl font-bold mb-4">Listado de Roles</h1>

                <div class="flex items-center justify-between mb-4">
                    <a href="{{ route('roles.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Registrar Nuevo Rol
                    </a>
                    
                    <!-- Buscador -->
                    <div class="relative w-full max-w-sm ml-auto">
                        <input type="text" id="searchInput" onkeyup="filterTable()" placeholder="Buscar cliente..."
                            class="w-full p-2 border border-gray-300 rounded-lg">
                    </div>
                </div>
        
                
        
                <table class="min-w-full table-auto bg-white shadow-md rounded-lg mt-3">
                    <thead>
                        <tr>
                            <th class="px-6 py-3 text-left">ID</th>
                            <th class="px-6 py-3 text-left">Nombre</th>
                            <th class="px-6 py-3 text-left">Descripción</th>
                            <th class="px-6 py-3 text-left">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($rol as $rol)
                        <tr>
                            <td class="px-6 py-4 border">{{ $rol->id }}</td>
                            <td class="px-6 py-4 border">{{ $rol->nombre }}</td>
                            <td class="px-6 py-4 border">{{ $rol->descripcion }}</td>
                            <td class="px-6 py-4 border">
                                <div class="flex space-x-2">
                                    <a href="{{ route('roles.edit', $rol->id) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">Editar</a>
                                    <form action="{{ route('roles.delete', $rol->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Eliminar</button>
                                    </form>   
                                </div>                                 
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>  
        </main>
    </div>
</body>
</html>
