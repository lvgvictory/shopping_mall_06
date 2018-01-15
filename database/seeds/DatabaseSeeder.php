<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserTableSeeder::class);
        $this->call(CategoryTableSeeder::class);
        $this->call(SubCategoryTableSeeder::class);
        $this->call(DiscountTableSeeder::class);
        $this->call(ProductTableSeeder::class);
        $this->call(ImageTableSeeder::class);
        $this->call(SizeTableSeeder::class);
        $this->call(SlideTableSeeder::class);
        $this->call(PostTableSeeder::class);
        $this->call(CommentTableSeeder::class);     
    }
}
