<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerformancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('performances', function (Blueprint $table) {
            $table->id();
            $table->string('forty_yard_dash')->nullable();
            $table->string('brench_press')->nullable();
            $table->string('strength_squat')->nullable();
            $table->string('vertical_jump')->nullable();
            $table->string('broad_jump')->nullable();
            $table->string('three_cone_drill')->nullable();
            $table->string('twenty_yard_shuttle')->nullable();
            $table->text('college_offers_football_commit')->nullable();
            $table->text('college_offers_football_university')->nullable();
            $table->text('college_offers_offer')->nullable();
            $table->text('college_offers_date')->nullable();
            $table->text('prospect_camps_date')->nullable();
            $table->text('prospect_camps_name')->nullable();
            $table->text('prospect_camps_location')->nullable();
            $table->text('prospect_camps_coach_name')->nullable();
            $table->string('size')->nullable();
            $table->string('accuracy')->nullable();
            $table->string('arm_strength')->nullable();
            $table->string('release')->nullable();
            $table->string('throw_on_run')->nullable();
            $table->string('footwork')->nullable();
            $table->string('poise')->nullable();
            $table->string('pocket_presence')->nullable();
            $table->string('decision_making')->nullable();
            $table->string('touch')->nullable();
            $table->string('score')->nullable();

            $table->unsignedBigInteger('profile_id')->unsigned()->index();
            $table->foreign('profile_id')->references('id')->on('profiles')->onDelete('cascade');

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
        Schema::dropIfExists('performances');
    }
}
