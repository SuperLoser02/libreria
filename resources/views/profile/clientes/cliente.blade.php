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
                <h1 class="text-3xl font-bold mb-4">Listado de Clientes</h1>
                
                <!-- Buscador y Botón de Registro en Línea -->
                <div class="flex items-center justify-between mb-4">
                    <a href="{{ route('cliente.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Registrar Nuevo Cliente
                    </a>
                    
                    <!-- Buscador -->
                    <div class="relative w-full max-w-sm ml-auto">
                        <input type="text" id="searchInput" onkeyup="filterTable()" placeholder="Buscar cliente..."
                            class="w-full p-2 border border-gray-300 rounded-lg">
                    </div>
                </div>

                <table id="clienteTable" class="min-w-full table-auto bg-white shadow-md rounded-lg mt-3">
                    <thead>
                        <tr>
                            <th class="px-6 py-3 text-left">CI</th>
                            <th class="px-6 py-3 text-left">Nombre</th>
                            <th class="px-6 py-3 text-left">Puntos</th>
                            <th class="px-6 py-3 text-left">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($clientes as $cliente)
                        <tr>
                            <td class="px-6 py-4 border">{{ $cliente->ci }}</td>
                            <td class="px-6 py-4 border">{{ $cliente->nombre }}</td>
                            <td class="px-6 py-4 border">{{ $cliente->puntos }}</td>
                            <td class="px-6 py-4 border">
                                <div class="flex space-x-2">
                                    <a href="{{ route('cliente.edit', $cliente->ci) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">Editar</a>
                                    <form action="{{ route('cliente.delete', $cliente->ci) }}" method="POST">
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

    <!-- Script para el filtro de la tabla -->
    <script>
        function filterTable() {
            const searchInput = document.getElementById("searchInput").value.toLowerCase();
            const table = document.getElementById("clienteTable");
            const rows = table.getElementsByTagName("tr");

            for (let i = 1; i < rows.length; i++) {
                const cells = rows[i].getElementsByTagName("td");
                let match = false;

                for (let j = 0; j < cells.length; j++) {
                    const cellContent = cells[j].textContent || cells[j].innerText;
                    if (cellContent.toLowerCase().includes(searchInput)) {
                        match = true;
                        break;
                    }
                }

                rows[i].style.display = match ? "" : "none";
            }
        }
    </script>
</body>
</html>
