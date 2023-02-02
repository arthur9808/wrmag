<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUniversityIdToProfiles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('profiles', function (Blueprint $table) {
            
            //Relacionar la tabla profiles con la tabla universities
            $table->unsignedBigInteger('university_id')->unsigned()->index()->nullable();
            $table->foreign('university_id')->references('id')->on('universities')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('profiles', function (Blueprint $table) {
            //
            // $table->dropColumn('university_id');
        });
    }
}
