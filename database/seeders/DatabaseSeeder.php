<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(10)->create();
        \App\Models\Categoria::factory(10)->create();
        \App\Models\Producto::factory(100)->create();

        \App\Models\User::factory()->create([
             'name' => 'Administrador',
             'email' => 'admin@email.com',
         ]);
    }
}
