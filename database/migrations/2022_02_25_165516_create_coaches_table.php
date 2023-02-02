<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoachesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coaches', function (Blueprint $table) {
            
            $table->id();
            $table->string('f_name');
            $table->string('l_name');
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('title')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('country')->nullable();
            $table->text('website')->nullable();
            $table->text('banner_title')->nullable();
            $table->date('birthday')->nullable();
            $table->text('image')->nullable();
            $table->text('coach_logo')->nullable();
            $table->text('bio')->nullable();

            //Social Media
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('instagram')->nullable();
            $table->string('tiktok')->nullable();

            $table->text('upcoming_camps_name')->nullable();
            $table->text('upcoming_camps_date')->nullable();
            $table->text('upcoming_camps_end_date')->nullable();
            $table->text('upcoming_camps_location')->nullable();
            $table->text('upcoming_camps_link')->nullable();
            $table->text('college_nfl_qbs_trained_name')->nullable();
            $table->text('college_nfl_qbs_trained_college')->nullable();

            //Gallery
            $table->text('featued_images')->nullable();

            //Sort Order
            $table->integer('sort_order')->nullable();

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
        Schema::dropIfExists('coaches');
    }
}
