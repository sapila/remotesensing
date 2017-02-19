<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('field_comments', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('field_image_id')->unsigned();
            $table->string('text');
            $table->timestamps();

            $table->foreign('field_image_id')->references('id')->on('field_images')->onDelete('cascade');
        });

        Schema::create('event_comments', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('event_image_id')->unsigned();
            $table->string('text');
            $table->timestamps();

            $table->foreign('event_image_id')->references('id')->on('event_images')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('field_comments');
        Schema::drop('event_comments');
    }
}
