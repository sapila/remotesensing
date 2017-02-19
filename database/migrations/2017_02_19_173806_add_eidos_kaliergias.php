<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddEidosKaliergias extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('fields', function($table) {
            $table->string('eidos');
        });

        Schema::table('events', function($table) {
            $table->string('eidos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('fields', function($table) {
            $table->dropColumn('eidos');
        });

        Schema::table('events', function($table) {
            $table->dropColumn('eidos');
        });
    }
}
