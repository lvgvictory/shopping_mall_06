<?php

use App\Models\Slide;
use Illuminate\Database\Seeder;

class SlideTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Slide::class, 5)->create();
    }
}
