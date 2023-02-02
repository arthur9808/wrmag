<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAcademicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('academics', function (Blueprint $table) {
            $table->id();
            $table->string('graduation_class_year')->nullable();
            $table->string('school_name')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('current_gpa')->nullable();
            $table->string('sat_score')->nullable();
            $table->string('atc_score')->nullable();
            $table->string('year')->nullable();
            $table->string('name_of_the_honor_or_award')->nullable();
            $table->text('football_career_honors_year')->nullable();
            $table->text('football_career_honors')->nullable();
            $table->text('wonderlic_practice_test')->nullable();
            $table->text('hight_school_stats_year')->nullable();
            $table->text('hight_school_stats_games_played')->nullable();
            $table->text('hight_school_stats_completions')->nullable();
            $table->text('hight_school_stats_passing_attempts')->nullable();
            $table->text('hight_school_stats_passing_yards')->nullable();
            $table->text('hight_school_stats_passing_tds')->nullable();
            $table->text('hight_school_stats_rushing_yards')->nullable();
            $table->text('hight_school_stats_rushing_tds')->nullable();

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
        Schema::dropIfExists('academics');
    }
}
