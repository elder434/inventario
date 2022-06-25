<?php

namespace Database\Seeders;


use App\Models\Producto;
use App\Models\Producto_entregado;
use App\Models\Responsable;
use App\Models\Tipo_producto;
use Database\Factories\Producto_entregadoFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        //$this->call(Tipo_producto::class);
        $tipo = new Tipo_producto();

        $tipo->tipo = 'notebook';
        $tipo->descripcion = 'notebook hp de 4GB de ram';
        $tipo->proveedor = 'asd';

        $tipo->save();

        $tipo2 = new Tipo_producto();

        $tipo2->tipo = 'impresora';
        $tipo2->descripcion = 'broders a color';
        $tipo2->proveedor = 'asd';

        $tipo2->save();

        $tipo3 = new Tipo_producto();

        $tipo3->tipo = 'proyector';
        $tipo3->descripcion = 'proyector nose que marca';
        $tipo3->proveedor = 'asd';

        $tipo3->save();

        $tipo4 = new Tipo_producto();

        $tipo4->tipo = 'parlante';
        $tipo4->descripcion = 'parlante sony';
        $tipo4->proveedor = 'asd';

        $tipo4->save();

        $tipo5 = new Tipo_producto();

        $tipo5->tipo = 'monitor';
        $tipo5->descripcion = 'monitor msi fullHD';
        $tipo5->proveedor = 'asd';

        $tipo5->save();

        $tipo6 = new Tipo_producto();

        $tipo6->tipo = 'router';
        $tipo6->descripcion = 'router tp-link';
        $tipo6->proveedor = 'asd';

        $tipo6->save();

        $tipo7 = new Tipo_producto();

        $tipo7->tipo = 'pc escritorio';
        $tipo7->descripcion = 'pc escritorio con 16GB de ram';
        $tipo7->proveedor = 'asd';

        $tipo7->save();


        $responsable = new Responsable();
        $responsable->responsable = 'daem el tabo';

        $responsable->save();

        $responsable2 = new Responsable();
        $responsable2->responsable = 'colegio el tabo';

        $responsable2->save();

        $responsable3 = new Responsable();
        $responsable3->responsable = 'colegio las cruces';

        $responsable3->save();
        
        
        Producto::factory(11)->create();
    }
}
