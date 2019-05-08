<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGradeClassificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grade_classifications', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('grade_id');
            $table->char('nim', 8);
            $table->foreign('grade_id')->references('id')->on('grades');
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
        Schema::dropIfExists('grade_classifications');
    }
}
