<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateProcedure1 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
            CREATE PROCEDURE CountStocks(code CHAR(8))
            BEGIN
                DECLARE total_stock INT;
                DECLARE total_sold INT;

                SELECT SUM(stocks.qty) INTO total_stock FROM stocks WHERE stocks.SKU = code;
                SELECT SUM(stocks.sold) INTO total_sold FROM stocks WHERE stocks.SKU = code;

                UPDATE products
                SET 
                    products.stock = total_stock,
                    products.sold = total_sold 
                WHERE
                    products.SKU = code;
            END;
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP PROCEDURE IF EXISTS CountStocks');
    }
}
