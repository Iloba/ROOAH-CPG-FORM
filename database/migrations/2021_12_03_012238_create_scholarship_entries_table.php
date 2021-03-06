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
            $table->string('phone');
            $table->string('occupation');
            $table->string('gender');
            $table->string('email');
            $table->string('country');
            $table->string('english_level');
            $table->text('social_account');
            $table->string('discord');
            $table->string('wallet');
            $table->string('axie_played');
            $table->string('understand_game_rules');
            $table->string('member');
            $table->text('experience');
            $table->string('playing_time');
            $table->string('refferal');
            $table->string('refferal_detail')->nullable();
            $table->text('comment')->nullable();
            $table->string('instant_messaging_platform');
            $table->string('instant_messaging_platform_username');
            $table->boolean('reviewed')->nullable();
            $table->string('status')->nullable();
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
