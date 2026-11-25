<?php

namespace Database\Seeders;
use App\Models\Usuario;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsuarioSeeder extends Seeder
{
    
    public function run(): void
    {
        Usuario::firstOrCreate(
            ['email' => 'test@example.com'],
            [
                'nombre' => 'Usuario',
                'apellido' => 'Prueba',
                'password' => Hash::make('password'),
            ]
        );
    }
}
