<?php

namespace App\Observers;

use App\Models\Producto;
use App\Models\Inventario;

class ProductoObserver
{
    /**
     * Handle the Producto "created" event.
     *
     * @param  \App\Models\Producto  $producto
     * @return void
     */
    public function created(Producto $producto)
    {
        // Crear un nuevo registro en el inventario cuando se cree un producto
        Inventario::create([
            'producto_id' => $producto->id,
            'nombre' => $producto->nombre,
            'cantidad' => 0, 
            'proveedor_id' => 1,

        ]);
    }
}
