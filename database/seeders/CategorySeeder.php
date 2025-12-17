<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    
public function run()
{
    Category::create(['name' => 'Alimentation']);
    Category::create(['name' => 'Salaire']);
    Category::create(['name' => 'Transport']);
}

}
