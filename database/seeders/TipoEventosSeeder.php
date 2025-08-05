<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TipoEvento;

class TipoEventosSeeder extends Seeder
{
    public function run()
    {
        $tipos = [
            ['nombre' => 'Conferencia'],
            ['nombre' => 'Taller'],
            ['nombre' => 'Seminario'],
            ['nombre' => 'Webinar'],
            ['nombre' => 'Curso'],
        ];

        foreach ($tipos as $tipo) {
            TipoEvento::create($tipo);
        }
    }
}

