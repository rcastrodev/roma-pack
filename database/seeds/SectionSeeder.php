<?php

use App\Page;
use App\Section;
use Illuminate\Database\Seeder;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $home_id    = Page::where('name', 'home')->first()->id;

        /** Home */
        Section::create(['page_id' => $home_id, 'name' => 'section_1']);
        Section::create(['page_id' => $home_id, 'name' => 'section_2']);

        /** Empresa */
        Section::create(['page_id' => Page::where('name', 'empresa')->first()->id, 'name' => 'section_1']);
        Section::create(['page_id' => Page::where('name', 'empresa')->first()->id, 'name' => 'section_2']);

        /** Calidad */
        Section::create(['page_id' => Page::where('name', 'calidad')->first()->id, 'name' => 'section_1']);
        Section::create(['page_id' => Page::where('name', 'calidad')->first()->id, 'name' => 'section_2']);
    }
}
