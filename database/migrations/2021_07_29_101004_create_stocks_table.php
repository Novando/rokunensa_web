<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stocks', function (Blueprint $table) {
            $table->id();
            $table->char('SKU', 8);
            $table->enum('size', ['XXL', 'XL', 'L', 'M', 'S'])->default('M');
            $table->unsignedInteger('qty')->default(12);
            $table->unsignedInteger('sold')->default(0);
            $table->timestamps();
            $table->foreign('SKU')->references('SKU')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stocks');
    }
}
