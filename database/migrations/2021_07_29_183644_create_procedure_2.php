<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateProcedure2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
            CREATE PROCEDURE CountRatings(code CHAR(8))
            BEGIN
                DECLARE total_reviewer INT;
                DECLARE total_score DEC(9, 2);
                DECLARE final_score DEC(3, 2);

                SELECT COUNT(ratings.score) INTO total_reviewer FROM ratings WHERE ratings.SKU = code;
                SELECT SUM(ratings.score) INTO total_score FROM ratings WHERE ratings.SKU = code;

                SET final_score = total_score / total_reviewer;

                UPDATE products SET products.rating = final_score WHERE products.SKU = code;
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
        DB::unprepared('DROP PROCEDURE IF EXISTS CountRatings');
    }
}
