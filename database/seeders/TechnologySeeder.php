<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use illuminate\Support\Str;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $technologies = ['Php', 'Laravel', 'Js', 'Css', 'Scss', 'VueJs', 'Html', 'Bootstrap', 'Vite'];

        foreach ($technologies as $technology) {
            $newTech = new Technology;
            $newTech->name = $technology;
            $newTech->slug = Str::slug($technology);
            $newTech->save();
        }
    }
}