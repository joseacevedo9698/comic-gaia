<?php

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
        factory(App\Titulo::class,50)->create();
        factory(App\idioma::class,3)->create();
        factory(App\tipo::class,50)->create();
        factory(App\editorial::class,50)->create();
        factory(App\genero::class,10)->create();
        factory(App\autor::class,10)->create();
        factory(App\dibujante::class,10)->create();
        factory(App\Libro::class,100)->create();
        factory(App\Producto_tipo::class,10)->create();
        factory(App\Producto::class,50)->create();
        factory(App\Producto_imagen::class,50)->create();
        factory(App\Galeria::class,50)->create();
        factory(App\Galeria_img::class,50)->create();




        for ($i=0; $i < 20; $i++) {
            DB::table('dibujante_libro')->insert(
                [
                    'libro_id' => App\Libro::select('id')->orderByRaw("RAND()")->first()->id,
                    'dibujante_id' => App\dibujante::select('id')->orderByRaw("RAND()")->first()->id,
                ]
            );

            DB::table('genero_libro')->insert(
                [
                    'libro_id' => App\Libro::select('id')->orderByRaw("RAND()")->first()->id,
                    'genero_id' => App\genero::select('id')->orderByRaw("RAND()")->first()->id,
                ]
            );

            DB::table('autor_libro')->insert(
                [
                    'libro_id' => App\Libro::select('id')->orderByRaw("RAND()")->first()->id,
                    'autor_id' => App\autor::select('id')->orderByRaw("RAND()")->first()->id,
                ]
            );
        }

    }
}
