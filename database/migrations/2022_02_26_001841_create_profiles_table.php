<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string('f_name');
            $table->string('l_name');
            $table->string('qb_email');
            $table->string('username');
            $table->string('parent_name')->nullable();
            $table->string('parent_email')->nullable();
            $table->string('slug')->nullable();
            $table->string('password');
            $table->string('password_token')->nullable();
            $table->string('phone')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('country')->nullable();
            $table->string('position')->nullable();
            $table->string('terms');
            $table->string('i_am')->nullable();
            // stripe_customer_id
            $table->string('stripe_customer_id')->nullable();

            // Id of the membership
            $table->unsignedBigInteger('membership_id')->unsigned()->index()->nullable();
            $table->foreign('membership_id')->references('id')->on('memberships')->onDelete('cascade');

            //About Page
            $table->string('recruiting_class_of')->nullable();
            $table->string('college_recruiting_status')->nullable();
            // $table->string('university')->nullable();
            $table->string('qb_coachs_name')->nullable();
            $table->string('qb_coachs_mobile')->nullable();
            $table->string('qb_coachs_email')->nullable();
            $table->text('biography')->nullable();
            $table->string('instagram')->nullable();
            $table->string('tiktok')->nullable();
            $table->string('twitter')->nullable();
            $table->string('facebook')->nullable();

            //Active Membership
            $table->boolean('active_membership')->nullable();

            //Prospect Info
            $table->string('height')->nullable();
            $table->string('weight')->nullable();
            $table->string('current_gpa')->nullable();
            $table->string('arm_length')->nullable();
            $table->string('hand_size')->nullable();
            $table->string('wing_span')->nullable();
            $table->string('feet_size')->nullable();

            //Player Photos
            $table->text('profile_photo')->nullable();
            $table->text('profile_cover_header')->nullable();
            
            //Views Count
            $table->integer('views')->default(0);
            $table->boolean('show_profile')->nullable();
            $table->boolean('confirm_email')->nullable();

            //Sort Order
            $table->integer('sort_order')->nullable();
            //Top 100 Players
            $table->integer('top_one_hundred')->nullable();

            $table->boolean('payment_expired')->nullable();
            
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
        Schema::dropIfExists('profiles');
    }
}
