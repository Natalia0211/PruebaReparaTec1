<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Cliente;

class ClienteTest extends TestCase
{
    public function test_crear_nuevo_cliente()
    {
        $cliente = Cliente::create([
            'nombre' => 'Ana',
            'apellidos' => 'Martinez',
            'telefono' => '987654321',
            'correo_electronico' => 'ana.martinez@gmail.com',
        ]);

        $this->assertDatabaseHas('clientes', [
            'correo_electronico' => 'ana.martinez@gmail.com',
        ]);
    }
}
