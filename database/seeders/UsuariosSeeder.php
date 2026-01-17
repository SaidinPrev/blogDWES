<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Usuari;

class UsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Usuari::factory()->count(3)->create();

        $usuari = new Usuari();
        $usuari->login = 'admin';
        $usuari->password = bcrypt('admin');
        $usuari->save();
    }
}
