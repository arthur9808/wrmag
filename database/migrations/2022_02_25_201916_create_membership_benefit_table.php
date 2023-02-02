<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembershipBenefitTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('membership_benefit', function (Blueprint $table) {
            $table->id();

            $table->foreignId('membership_id')
                ->nullable()    
                ->constrained('memberships')
                ->cascadeOnUpdate()
                ->nullOnDelete();

            $table->foreignId('benefit_id')
                ->nullable()    
                ->constrained('benefits')
                ->cascadeOnUpdate()
                ->nullOnDelete();
                
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('membership_benefit');
    }
}
