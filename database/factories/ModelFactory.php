<?php

use Faker\Generator as Faker;

$factory->define(App\Titulo::class, function (Faker $faker) {
    return [
        'Nombre' => $faker->name
    ];
});

$factory->define(App\editorial::class, function (Faker $faker) {
    return [
        'Nombre' => $faker->name
    ];
});

$factory->define(App\tipo::class, function (Faker $faker) {
    return [
        'Nombre' => $faker->name
    ];
});

$factory->define(App\idioma::class, function (Faker $faker) {
    return [
        'Nombre' => $faker->name
    ];
});




$factory->define(App\genero::class, function (Faker $faker) {
    return [
        'Nombre' => $faker->name
    ];
});

$factory->define(App\dibujante::class, function (Faker $faker) {
    return [
        'Nombre' => $faker->name
    ];
});

$factory->define(App\autor::class, function (Faker $faker) {
    return [
        'Nombre' => $faker->name
    ];
});


$factory->define(App\Libro::class, function (Faker $faker) {

    return [
        'titulo_id' => $faker->numberBetween($min = 1,$max = 50),
        'editorial_id' => $faker->numberBetween($min = 1,$max = 50),
        'idioma_id' => $faker->numberBetween($min = 1,$max = 3),
        'tipo_id' => $faker->numberBetween($min = 1,$max = 50),
        'ejemplares' => $faker->numberBetween($min = 1,$max = 3),
        'volumen' => $faker->numberBetween($min = 1,$max = 10),
        'ano_public' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'sinopsis' => $faker->word(),
        'img_path' => $faker->word()
    ];
});

$factory->define(App\Producto::class, function (Faker $faker) {
    return [
            'nombre' => $faker->name,
            'descripcion' => $faker->word(),
            'precio' => $faker->numberBetween($min = 2000,$max = 100000),
            'tipo_id' => $faker->numberBetween($min = 1,$max = 10)
    ];
});

$factory->define(App\Producto_imagen::class, function (Faker $faker) {
    return [
            'path_img' => $faker->name,
            'producto_id' => $faker->numberBetween($min = 1,$max = 50)

    ];
});


$factory->define(App\Producto_tipo::class, function (Faker $faker) {
    return [
            'nombre' => $faker->name
    ];
});



