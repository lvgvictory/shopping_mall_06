<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForeignkeyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {         
        
        Schema::table('sub_categories', function (Blueprint $table) {
            
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });

        Schema::table('products', function (Blueprint $table) {
            
            $table->foreign('subcategory_id')->references('id')->on('sub_categories')->onDelete('cascade');
            $table->foreign('discount_id')->references('id')->on('discounts')->onDelete('cascade');
        });

        Schema::table('images', function (Blueprint $table) {
            
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });

        Schema::table('product_sizes', function (Blueprint $table) {
            
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('size_id')->references('id')->on('sizes')->onDelete('cascade');
        });

        Schema::table('comments', function (Blueprint $table) {
            
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::table('bill_details', function (Blueprint $table) {
            
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('bill_id')->references('id')->on('bills')->onDelete('cascade');
        });

        Schema::table('bills', function (Blueprint $table) {
            
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::table('socials', function (Blueprint $table) {
            
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
        
        Schema::table('news', function (Blueprint $table) {
            
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {        
        Schema::disableForeignKeyConstraints();
    }
}
