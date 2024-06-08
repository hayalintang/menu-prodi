<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    
    public function run(): void
    {
        $categories = [
            ['name' => 'Web Design', 'slug' => 'web-design'],
            ['name' => 'Programming', 'slug' => 'programming'],
            ['name' => 'Machine Learning', 'slug' => 'machine-learning'],
            ['name' => 'UI UX', 'slug' => 'ui-ux'],
            ['name' => 'Data Structure', 'slug' => 'data-structure'],
        ];

        foreach ($categories as $category) {
            Category::firstOrCreate(
                ['slug' => $category['slug']],
                ['name' => $category['name']]
            );
        }
    }
}
