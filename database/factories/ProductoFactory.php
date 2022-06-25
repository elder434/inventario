<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Producto>
 */
class ProductoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'file'=> '/storage//xRIMgRC6tq8xlMv1Weqqm5H1Jm4hOmMn9xsZOc21.jpg',
            'tipo_producto_id'=> $this->faker->randomElement([1,2,3,4,5,6,7]),
            'serie'=> '5CD129B7WD',
            'inventario'=> 5843,
            'orden'=> '4844-18-SE22',
            'factura' => 'qwerty',
        ];
    }
}
