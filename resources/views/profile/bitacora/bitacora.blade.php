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
        <main class="flex-1 p-4 mt-24">
            <h1 class="text-2xl font-semibold mb-4">Bitácora</h1>

            <div class="relative w-full max-w-sm ml-auto">
                <input type="text" id="searchInput" onkeyup="filterTable()" placeholder="Buscar cliente..."
                    class="w-full p-2 border border-gray-300 rounded-lg">
            </div>

            <!-- Tabla responsiva con scroll dentro de un contenedor -->
            <div class="max-w-full mt-4 overflow-auto shadow-lg border border-gray-300 rounded-lg" style="max-height: 400px;">
                <table class="min-w-full table-auto bg-white shadow-md rounded-lg">
                    <thead class="sticky top-0 bg-gray-100">
                        <tr>
                            <th class="px-4 py-2">ID</th>
                            <th class="px-4 py-2">Tabla Afectada</th>
                            <th class="px-4 py-2">Acción Realizada</th>
                            <th class="px-4 py-2">Usuario</th>
                            <th class="px-4 py-2">Fecha y Hora</th>
                            <th class="px-4 py-2">Datos Anteriores</th>
                            <th class="px-4 py-2">Datos Nuevos</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($bitacora as $registro)
                            <tr class="hover:bg-gray-50">
                                <td class="border px-4 py-2">{{ $registro->id }}</td>
                                <td class="border px-4 py-2">{{ $registro->tabla_Afectada }}</td>
                                <td class="border px-4 py-2">{{ $registro->Accion_realizad }}</td>
                                <td class="border px-4 py-2">{{ $registro->Usuario }}</td>
                                <td class="border px-4 py-2">{{ $registro->Fecha_Hora }}</td>
                                <td class="border px-4 py-2">{{ $registro->Datos_Anteriores }}</td>
                                <td class="border px-4 py-2">{{ $registro->Datos_Nuevos }}</td>
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
