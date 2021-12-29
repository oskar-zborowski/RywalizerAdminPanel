<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('user_roles', function (Blueprint $table) {
            $table->tinyIncrements('id');
            $table->unsignedSmallInteger('role_id')->unique();
            $table->unsignedTinyInteger('access_level');
        });

        Schema::table('user_roles', function (Blueprint $table) {
            $table->foreign('role_id')->references('id')->on('default_types')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('user_roles');
    }
}
