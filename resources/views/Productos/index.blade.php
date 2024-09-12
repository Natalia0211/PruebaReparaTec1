@extends('layouts.app')

@section('titulo', 'Página Principal')

@section('contenido')
    {{-- Botón para crear un producto nuevo --}}
    <div class="flex justify-end m-4">
        <a href="{{ route('productos.create') }}" class="btn btn-outline">Nuevo producto</a>
    </div>

    {{-- Contenedor de productos en grid --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 p-4">
        @foreach ($productos as $producto)
            <div class="card bg-base-100 shadow-xl">
                <figure>
                    <img src="https://picsum.photos/id/{{ $producto->id }}/240" alt="{{ $producto->nombre }}"
                        class="w-full h-40 object-cover" />
                </figure>
                <div class="card-body">
                    <h2 class="card-title">{{ $producto->nombre }}</h2>
                    <p>{{ $producto->descripcion }}</p>
                    Precio: <div class="badge badge-outline">{{ $producto->precio }}</div>
                    <div class="card-actions justify-end mt-4">
                        <a href="{{ route('productos.edit', $producto->id) }}" class="btn btn-outline btn-xs">Editar</a>
                        <form action="{{ route('productos.destroy', $producto->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline btn-xs">Eliminar</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
