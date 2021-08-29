<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('invoice');
            $table->bigInteger('user_id')->unsigned();
            $table->decimal('subtotal');
            $table->string('coupon')->nullable();
            $table->decimal('tax');
            $table->decimal('total');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('address_line_1');
            $table->string('address_line_2');
            $table->string('city');
            $table->string('country');
            $table->string('zip');
            $table->string('phone');
            $table->enum('status', ['Delivered', 'Canceled', 'On Process', 'Waiting Payment', 'Refunded'])->default('Waiting Payment');
            $table->boolean('different_address')->default(false);
            $table->text('remark')->nullable();
            $table->timestamps();
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
        Schema::dropIfExists('orders');
    }
}
