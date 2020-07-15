<?php

use Illuminate\Database\Seeder;
use App\Modules\Category\Models\Category;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::truncate();
        factory(Category::class, 40)->create();
    }
}
