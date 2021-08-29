<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateRatingCounterTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
            CREATE TRIGGER RatingInsert
            AFTER INSERT
            ON ratings FOR EACH ROW
            BEGIN
                CALL CountRatings(NEW.product_id);
            END;
        ');

        DB::unprepared('
            CREATE TRIGGER RatingUpdate
            AFTER UPDATE
            ON ratings FOR EACH ROW
            BEGIN
                CALL CountRatings(OLD.product_id);
            END;
        ');

        DB::unprepared('
            CREATE TRIGGER RatingDelete
            AFTER DELETE
            ON ratings FOR EACH ROW
            BEGIN
                CALL CountRatings(OLD.product_id);
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
        DB::unprepared('DROP TRIGGER IF EXISTS RatingInsert');
        DB::unprepared('DROP TRIGGER IF EXISTS RatingUpdate');
        DB::unprepared('DROP TRIGGER IF EXISTS RatingDelete');
    }
}