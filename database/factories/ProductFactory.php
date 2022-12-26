<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use App\SubCategory;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'sub_category_id' => function () {
            return SubCategory::inRandomOrder()->first()->id;
        },
        'name' => $faker->name,
        'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis inventore veniam labore odio molestias tempora aperiam, voluptates dolor, ut praesentium laudantium voluptatem doloremque eveniet earum accusamus asperiores nesciunt, voluptatum provident!'
    ];
});