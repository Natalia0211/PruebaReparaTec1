<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventario extends Model
{
    use HasFactory;
    protected $fillable = ['nombre', 'cantidad', 'precio_unitario', 'proveedor_id', 'producto_id'];

    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class, 'ID_Proveedor');
    }

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'ID_Producto');
    }
}
