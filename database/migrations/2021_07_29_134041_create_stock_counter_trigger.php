<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateStockCounterTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
            CREATE TRIGGER StockInsert
            AFTER INSERT
            ON stocks FOR EACH ROW
            BEGIN
                CALL CountStocks(NEW.SKU);
            END;
        ');

        DB::unprepared('
            CREATE TRIGGER StockUpdate
            AFTER UPDATE
            ON stocks FOR EACH ROW
            BEGIN
                CALL CountStocks(OLD.SKU);
            END;
        ');

        DB::unprepared('
            CREATE TRIGGER StockDelete
            AFTER DELETE
            ON stocks FOR EACH ROW
            BEGIN
                CALL CountStocks(OLD.SKU);
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
        DB::unprepared('DROP TRIGGER IF EXISTS StockInsert');
        DB::unprepared('DROP TRIGGER IF EXISTS StockUpdate');
        DB::unprepared('DROP TRIGGER IF EXISTS StockDelete');
    }
}
