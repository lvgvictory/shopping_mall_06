<?php

use App\Models\Discount;
use Illuminate\Database\Seeder;

class DiscountTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Discount::class, 10)->create();
    }
}
