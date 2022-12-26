<?php

use App\Category;
use App\SubCategory;
use Illuminate\Database\Seeder;

class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SubCategory::create([
            'order'         => 'AA',
            'category_id'   => Category::where('name', 'FILM TERMOCONTRAIBLE')->first()->id,
            'name'          => 'PRESENTACIÒN',
        ]);

        SubCategory::create([
            'order'         => 'BB',
            'category_id'   => Category::where('name', 'FILM TERMOCONTRAIBLE')->first()->id,
            'name'          => 'FILM STRETCH DE COLOR',
        ]);

        SubCategory::create([
            'order'         => 'CC',
            'category_id'   => Category::where('name', 'FILM TERMOCONTRAIBLE')->first()->id,
            'name'          => 'FILM STRETCH CON IMPRESIÓN',
        ]);
    }
}
