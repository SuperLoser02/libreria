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
            <h1 class="text-2xl font-semibold mb-4">Usuarios</h1>
            <div class="row">
                <div class="col-12">
    
                    {{-- <div class="mb-2 d-flex justify-content-between">
                        <div class="form-group">
                            <a href="" class="btn btn-primary waves-effect waves-light">
                                <i class="fas fa-plus-circle"></i>&nbsp;
                                Nuevo Usuario
                            </a>
                        </div>
                    </div> --}}
    
                    <div class="card-box">
                        <div class="table-responsive">
                            <table id="table-usuario" class="table table-hover mb-0 dts">
                                <thead class="bg-dark text-center text-white text-nowrap">
                                    <tr style="cursor: pointer">
                                        <th scope="col">CI</th>
                                        <th scope="col">Nombre del usuario</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Rol</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $usuario)
    <tr class="text-nowrap text-center">
        <th scope="row" class="align-middle">{{ $usuario->id }}</th>
        <td class="align-middle">{{ $usuario->empleado->nombre ?? 'N/A' }} </td>
        <td class="align-middle">{{ $usuario->email ?? 'No especificado' }}</td>
        <td class="align-middle">{{ $usuario->rol->nombre ?? 'Sin rol asignado' }}</td>
        <td class="align-middle text-nowrap" style="width: 150px">
            <div class="d-flex justify-content-center">
                
                <a href="{{ route('usuarios.edit', $usuario->id) }}" title="Editar" class="btn btn-sm btn-primary mx-1">
                    <i class="fas fa-edit"></i>
                </a>
                <form id="formDeleteUsuario_{{ $usuario->id }}" action="{{ route('usuarios.delete', $usuario->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="button" title="Eliminar" class="btn btn-sm btn-danger">
                        <i class="fas fa-trash"></i>
                    </button>
                </form>
            </div>
        </td>
    </tr>
@endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>