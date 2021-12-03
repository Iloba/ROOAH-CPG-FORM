<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScholarshipEntriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scholarship_entries', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('age');
            $table->string('occupation');
            $table->string('gender');
            $table->string('email');
            $table->string('country');
            $table->string('english_level');
            $table->string('social_account');
            $table->string('discord');
            $table->string('axie_played');
            $table->string('understand_game_rules');
            $table->string('member');
            $table->string('experience');
            $table->string('playing_time');
            $table->string('refferal');
            $table->string('comment');
            $table->boolean('reviewed')->nullable();
            $table->string('interviewed')->nullable();
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
        Schema::dropIfExists('scholarship_entries');
    }
}
