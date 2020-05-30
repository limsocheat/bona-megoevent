<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventOrganizerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_organizer', function (Blueprint $table) {
            $table->unsignedBigInteger('event_id')->index();
            $table->unsignedBigInteger('organizer_id')->index();

            $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade');
            $table->foreign('organizer_id')->references('id')->on('organizers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('event_organizer');
    }
}
