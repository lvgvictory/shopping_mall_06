<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\User::class, function (Faker\Generator $faker) {
    static $password;
     return [
        'name' => $faker->name,
        'email' => $faker->unique()->email,
        'password' => $password ?: $password = bcrypt('12345678'),
        'image' => config('custom.defaultAvatar'),
        'address' => $faker->address,
        'phone' => $faker->phoneNumber,
        'role' => $faker->randomElement($array = array(0, 1)),
    ];
});

$factory->define(App\Models\Category::class, function (Faker\Generator $faker) {
     return [
        'name' => $faker->randomElement($array = array('Thời trang nam', 'Thời trang nữ')),
        'slug' => $faker->text(10),
    ];
});

$factory->define(App\Models\SubCategory::class, function (Faker\Generator $faker) {
    return [
        'category_id' => function () {
            return App\Models\Category::pluck('id')
                ->random(1)
                ->first();
        },
        'name' => $faker->text(15),
        'slug' => $faker->text(10),
    ];
});

$factory->define(App\Models\Discount::class, function (Faker\Generator $faker) {
    return [
        'discount' => $faker->numberBetween(0, 80),
        'start_at' => $faker->dateTime(),
        'end_at' => $faker->dateTime(),
    ];
});

$factory->define(App\Models\Product::class, function (Faker\Generator $faker) {
    return [
        'subcategory_id' => function () {
            return App\Models\SubCategory::pluck('id')
                ->random(1)
                ->first();
        },
        'discount_id' => function () {
            return App\Models\Discount::pluck('id')
                ->random(1)
                ->first();
        },
        'name' => $faker->text(15),
        'price' => $faker->numberBetween(120000, 1000000),
        'total' => $faker->numberBetween(10, 100),
        'description' => $faker->text(30),
        'slug' => $faker->text(10),
        'status' => $faker->randomElement($array = array(0, 1)),
    ];
});

$factory->define(App\Models\Image::class, function (Faker\Generator $faker) {
    return [
        'product_id' => function () {
            return App\Models\Product::pluck('id')
                ->random(1)
                ->first();
        },
        'image' => config('custom.defaultAvatar'),
    ];
});

$factory->define(App\Models\Size::class, function (Faker\Generator $faker) {
    return [
        'size' => $faker->randomElement($array = array('M', 'L', 'XL', 'S')),
    ];
});

$factory->define(App\Models\ProductSize::class, function (Faker\Generator $faker) {
    return [
        'product_id' => function () {
            return App\Models\Product::pluck('id')
                ->random(1)
                ->first();
        },
        'size_id' => function () {
            return App\Models\Size::pluck('id')
                ->random(1)
                ->first();
        },
    ];
});

$factory->define(App\Models\Slide::class, function (Faker\Generator $faker) {
    return [
        'image' => config('custom.defaultAvatar'),
        'active' => $faker->randomElement($array = array(0, 1)),
    ];
});

$factory->define(App\Models\Post::class, function (Faker\Generator $faker) {
    return [
        'user_id' => function () {
            return App\Models\User::pluck('id')
                ->random(1)
                ->first();
        },
        'image' => config('custom.defaultAvatar'),
        'active' => $faker->randomElement($array = array(0, 1)),
        'content' => $faker->text(30),
        'title' => $faker->text(20),
        'slug' => $faker->text(10),
    ];
});

$factory->define(App\Models\Comment::class, function (Faker\Generator $faker) {
    return [
        'user_id' => function () {
            return App\Models\User::pluck('id')
                ->random(1)
                ->first();
        },
        'product_id' => function () {
            return App\Models\Product::pluck('id')
                ->random(1)
                ->first();
        },
        'content' => $faker->text(30),
        'rate' => $faker->numberBetween(1, 5),
    ];
});
