<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->string('device_id');
            $table->string('onoma_gegonotos');
            $table->string('perigrafi_gegonotos');
            $table->string('onoma_xorafiou');
            $table->string('perioxi_xorafiou');
            $table->string('etos_kaliergias');
            $table->string('onoma_kaliergiti');
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
        Schema::drop('events');
    }
}
