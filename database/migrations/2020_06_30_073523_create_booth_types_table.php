<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBoothTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booth_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->double('pricing')->nullable()->default(0);
            $table->integer('total')->nullable()->default(0);
            $table->binary('image')->nullable();
            $table->text('vip_speech')->nullable();
            $table->text('vip_moderator')->nullable();
            $table->integer('ads_event')->nullable();
            $table->integer('banner_ads_homepage')->nullable();
            $table->string('number_products')->nullable();
            $table->text('auction')->nullable();
            $table->text('leads')->nullable();
            $table->text('live_chat')->nullable();
            $table->text('surveys')->nullable();
            $table->text('description')->nullable();
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
        Schema::dropIfExists('booth_types');
    }
}
