<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            //$table->bigIncrements('id');
            $table->primary('id');
            $table->rememberToken();

            $table->unsignedBigInteger('id');
            $table->string('password');
            $table->string('name', 50);
            $table->string('academic_year', 2);
            $table->unsignedTinyInteger('age');
            $table->unsignedTinyInteger('gender')->nullable();
            $table->string('faculty', 30)->nullable();
            $table->string('department', 30)->nullable();
            $table->unsignedInteger('club')->nullablle();
            $table->timestamps();
            //$table->unsignedTinyInteger('role');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
