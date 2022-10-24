<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Generos;

class GenerosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Generos::create([
            'titulo' => 'Romance'
        ]);

        Generos::create([
            'titulo' => 'Drama'
        ]);

        Generos::create([
            'titulo' => 'Ficção'
        ]);

        Generos::create([
            'titulo' => 'Aventura'
        ]);

        Generos::create([
            'titulo' => 'Terror'
        ]);

        Generos::create([
            'titulo' => 'Quadrinhos'
        ]);

        Generos::create([
            'titulo' => 'Religiosos'
        ]);
    }
}
