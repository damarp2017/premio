<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAchievementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('achievements', function (Blueprint $table) {
            $table->increments('id');
            $table->char('nim', 8);
            $table->string('team_name', 255);
            $table->enum('achievement', ['winner', 'runner up', 'third place']);
            $table->integer('prize');
            $table->string('competition', 255);
            $table->string('place_of_competition', 255);
            $table->date('date_of_competition');
            $table->text('certificate');
            $table->foreign('nim')->references('nim')->on('users');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('achievements');
    }
}
