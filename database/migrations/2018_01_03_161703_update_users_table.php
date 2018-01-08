<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('password')->nullable()->change();
            $table->string('address')->after('password')->nullable();
            $table->string('phone')->after('password')->nullable();
            $table->tinyInteger('role')->after('password');
            $table->string('image')->nullable()->after('password');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('password');
            $table->dropColumn('address');
            $table->dropColumn('phone');
            $table->dropColumn('role');
            $table->dropColumn('image');
        });
    }
}
