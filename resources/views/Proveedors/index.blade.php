@extends('layouts.app')

@section('titulo', 'Listar Proveedores')
@section('cabecera', 'Listar Proveedores')

@section('contenido')
    {{-- Mostrar mensajes de éxito --}}
    @if (session('success'))
        <div class="alert alert-success mb-4">
            {{ session('success') }}
        </div>
    @endif

    {{-- Botón para crear un proveedor nuevo --}}
    <div class="flex justify-end m-4">
        <a href="{{ route('proveedors.create') }}" class="btn btn-outline btn-sm">Nuevo Proveedor</a>
    </div>

    {{-- Tabla de proveedores --}}
    <div class="overflow-x-auto">
        <table class="table table-zebra w-full">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Empresa</th>
                    <th>Dirección</th>
                    <th>Teléfono</th>
                    <th>Correo Electrónico</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($proveedors as $proveedor)
                    <tr>
                        <td>{{ $proveedor->id }}</td>
                        <td>{{ $proveedor->empresa }}</td>
                        <td>{{ $proveedor->direccion }}</td>
                        <td>{{ $proveedor->telefono }}</td>
                        <td>{{ $proveedor->correo_electronico }}</td>
                        <td class="flex space-x-2">
                            <a href="{{ route('proveedors.edit', $proveedor->id) }}" class="btn btn-warning btn-xs">Editar</a>
                            <form action="{{ route('proveedors.destroy', $proveedor->id) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-error btn-xs"
                                    onclick="return confirm('¿Estás seguro de que deseas eliminar este proveedor?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
