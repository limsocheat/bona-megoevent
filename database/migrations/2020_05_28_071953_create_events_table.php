<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('event_experience_id')->index()->nullable();
            $table->unsignedBigInteger('event_team_id')->index()->nullable();
            $table->unsignedBigInteger('event_frequency_id')->index()->nullable();
            $table->unsignedBigInteger('event_attendance_id')->index()->nullable();
            $table->unsignedBigInteger('event_location_id')->index()->nullable();
            $table->unsignedBigInteger('type_id')->index()->nullable();
            $table->unsignedBigInteger('category_id')->index()->nullable();
            $table->string('name');
            $table->enum('mode', ['single', 'recurring'])->default('single');
            $table->date('start_date')->nullable();
            $table->time('start_time')->nullable();
            $table->date('end_date')->nullable();
            $table->time('end_time')->nullable();
            $table->text('location')->nullable();
            $table->text('description')->nullable();
            $table->boolean('active')->default(1);
            $table->timestamps();

            $table->foreign('event_experience_id')->references('id')->on('options')->onDelete('set null');
            $table->foreign('event_team_id')->references('id')->on('options')->onDelete('set null');
            $table->foreign('event_frequency_id')->references('id')->on('options')->onDelete('set null');
            $table->foreign('event_attendance_id')->references('id')->on('options')->onDelete('set null');
            $table->foreign('event_location_id')->references('id')->on('options')->onDelete('set null');
            $table->foreign('type_id')->references('id')->on('event_types')->onDelete('set null');
            $table->foreign('category_id')->references('id')->on('event_categories')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}
