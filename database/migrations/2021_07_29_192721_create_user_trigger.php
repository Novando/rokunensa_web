<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateUserTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
            CREATE TRIGGER NewUser
            AFTER INSERT
            ON users FOR EACH ROW
            BEGIN
                INSERT INTO user_details(username) VALUES (NEW.username);
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
        DB::unprepared('DROP TRIGGER IF EXISTS NewUser');
    }
}
