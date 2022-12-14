<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('team_id')->nullable();
            $table->string('title')->nullable();
            $table->string('name');
            $table->string('home_town')->nullable();
            $table->string('slug');
            $table->string('email')->unique();
            $table->string('image')->nullable();
            $table->string('phone')->nullable();
            $table->string('type');
            $table->string('exit_velo')->nullable();
            $table->string('overhand_velo')->nullable();
            $table->string('inf_pop_time')->nullable();
            $table->string('catcher_pop_time')->nullable();
            $table->string('home_to_1st')->nullable();
            $table->string('pitching_velo')->nullable();
            $table->string('high_school')->nullable();
            $table->string('guest_playing')->nullable();
            $table->string('school_name')->nullable();
            $table->string('class_of')->nullable();
            $table->string('gpa')->nullable();
            $table->string('weighted_gpa')->nullable();
            $table->string('sat')->nullable();
            $table->string('act')->nullable();
            $table->string('jersey_no')->nullable();
            $table->string('height')->nullable();
            $table->string('bats')->nullable();
            $table->string('throws')->nullable();
            $table->string('primary_position')->nullable();
            $table->string('youtube')->nullable();
            $table->string('twitter')->nullable();
            $table->string('school_site_link')->nullable();
            $table->string('video')->nullable();
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
