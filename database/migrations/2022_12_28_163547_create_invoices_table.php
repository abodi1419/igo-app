<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignId('branch_id')->nullable()->constrained('branches')->nullOnDelete();
            $table->foreignId('customer_id')->nullable()->constrained('customers')->nullOnDelete();
            $table->string('customer_name');
            $table->string('customer_phone',20);
            $table->string('restaurant_name');
            $table->string('restaurant_name_ar');
            $table->string('branch_username');
            $table->string('branch_name');
            $table->string('branch_name_ar');
            $table->string('coupon',50)->nullable();
            $table->tinyInteger('type');
            $table->integer('num_of_people')->nullable();
            $table->dateTime('arrival_time');
            $table->tinyInteger('status');
            $table->decimal('subtotal');
            $table->decimal('discount');
            $table->decimal('total');
            $table->text('notes')->nullable();
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
        Schema::dropIfExists('invoices');
    }
}
