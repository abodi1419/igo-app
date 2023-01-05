<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('name_ar')->nullable();

            $table->string('email')->unique();
            $table->string('phone'); // customer, admin, restaurant
            $table->string('commercial_register')->nullable(); // customer, admin, restaurant

            $table->tinyInteger('status')->default(1); // customer, admin, restaurant

            $table->text('description')->nullable(); // restaurant
            $table->string('image')->nullable(); // customer, restaurant

            $table->decimal('commission')->default(5); // restaurant

            $table->integer('num_of_branches')->nullable(); // restaurant
            $table->tinyInteger('rating')->nullable(); // restaurant

            $table->tinyInteger('type')->default(1); // restaurant
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
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
