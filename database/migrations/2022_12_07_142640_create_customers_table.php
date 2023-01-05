<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // customer, admin, restaurant
            $table->string('phone')->unique(); // customer, admin, restaurant
            $table->string('password')->nullable(); // customer, admin, restaurant
            $table->string('image')->nullable(); // customer, restaurant
            $table->string('city')->nullable(); // customer
            $table->string('district')->nullable(); // customer
            $table->tinyInteger('status')->default(1); // customer, admin, restaurant
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
        Schema::dropIfExists('customers');
    }
}
