<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    // Dans DatabaseSeeder.php
public function run()
{
    $categories = [
        // Revenus
        ['name' => 'Salaire', 'type' => 'income', 'icon' => 'fa-money-bill-wave'],
        ['name' => 'Prime', 'type' => 'income', 'icon' => 'fa-gift'],
        ['name' => 'Vente', 'type' => 'income', 'icon' => 'fa-tag'],
        
        // Dépenses
        ['name' => 'Courses', 'type' => 'expense', 'icon' => 'fa-shopping-cart'],
        ['name' => 'Loyer', 'type' => 'expense', 'icon' => 'fa-home'],
        ['name' => 'Transport', 'type' => 'expense', 'icon' => 'fa-car'],
    ];
    
    foreach ($categories as $category) {
        \App\Models\Category::create($category);
    }
}


}
