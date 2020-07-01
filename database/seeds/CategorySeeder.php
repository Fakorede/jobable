<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            'AdTech',
            'Banking',
            'Construction',
            'Engineering',
            'FinTech',
            'Government',
            'Health',
            'Insurance',
            'Software',
            'Others',
        ];

        foreach ($categories as $category) {
            Category::create(['name' => $category]);
        }
    }
}
