<?php

namespace Database\Seeders;

use App\Models\Tipo_producto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Tipo_productosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipo = new Tipo_producto();

        $tipo->tipo = 'notebook';
        $tipo->descripcion = 'notebook hp de 4GB de ram';

        $tipo->save();

        $tipo2 = new Tipo_producto();

        $tipo2->tipo = 'impresora';
        $tipo2->descripcion = 'broders a color';

        $tipo2->save();

        $tipo3 = new Tipo_producto();

        $tipo3->tipo = 'proyector';
        $tipo3->descripcion = 'proyector nose que marca';

        $tipo3->save();

        $tipo4 = new Tipo_producto();

        $tipo4->tipo = 'parlante';
        $tipo4->descripcion = 'parlante sony';

        $tipo4->save();

        $tipo5 = new Tipo_producto();

        $tipo5->tipo = 'monitor';
        $tipo5->descripcion = 'monitor msi fullHD';

        $tipo5->save();

        $tipo6 = new Tipo_producto();

        $tipo6->tipo = 'router';
        $tipo6->descripcion = 'router tp-link';

        $tipo6->save();

        $tipo7 = new Tipo_producto();

        $tipo7->tipo = 'pc escritorio';
        $tipo7->descripcion = 'pc escritorio con 16GB de ram';

        $tipo7->save();
    }
}
