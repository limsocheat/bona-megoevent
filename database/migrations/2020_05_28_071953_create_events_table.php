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
            $table->unsignedBigInteger('type_id')->index()->nullable();
            $table->unsignedBigInteger('category_id')->index()->nullable();
            $table->unsignedBigInteger('location_id')->index()->nullable();
            $table->unsignedBigInteger('organizer_id')->index();
            $table->string('name');
            $table->text('description')->nullable();
            $table->enum('mode', ['single', 'recurring'])->default('single');
            $table->string('image')->nullable();
            $table->integer('diamond_max')->nullable()->default(0);
            $table->integer('gold_max')->nullable()->default(0);
            $table->integer('silver_max')->nullable()->default(0);
            $table->integer('bronze_max')->nullable()->default(0);
            $table->date('start_date')->nullable()->default(date('Y-m-d'));
            $table->date('end_date')->nullable()->default(date('Y-m-d'));
            $table->time('start_time')->nullable()->default(date('H:i:s'));
            $table->time('end_time')->nullable()->default(date('H:i:s'));
            $table->integer('pax_min')->nullable()->default(0);
            $table->integer('pax_max')->nullable()->default(0);
            $table->integer('pax_min_last_date')->nullable()->default(0);
            $table->double('price')->nullable()->default(0);
            $table->double('early_bird_price')->nullable()->default(0);
            $table->string('early_bird_date')->nullable()->default(date('Y-m-d'));
            $table->double('group_price')->nullable()->default(0);
            $table->integer('group_min_pax')->nullable()->default(0);
            $table->boolean('active')->nullable()->default(1);
            $table->timestamps();

            $table->foreign('event_experience_id')->references('id')->on('options')->onDelete('set null');
            $table->foreign('event_team_id')->references('id')->on('options')->onDelete('set null');
            $table->foreign('event_frequency_id')->references('id')->on('options')->onDelete('set null');
            $table->foreign('event_attendance_id')->references('id')->on('options')->onDelete('set null');
            $table->foreign('location_id')->references('id')->on('locations')->onDelete('set null');
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
