<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRatingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ratings', function (Blueprint $table) {
            $table->id();
            $table->char('SKU', 8);
            $table->string('reviewer');
            $table->text('review')->nullable();
            $table->decimal('score')->default(5);
            $table->timestamps();
            $table->foreign('SKU')->references('SKU')->on('products')->onDelete('cascade');
            $table->foreign('reviewer')->references('username')->on('user_details');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ratings');
    }
}
