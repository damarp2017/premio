<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->char('nim', 8)->unique();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->enum('gender', ['male', 'female'])->nullable()->default(null);
            $table->string('place_of_birth')->nullable()->default(null);
            $table->date('date_of_birth')->nullable()->default(null);
            $table->enum('religion', ['islam', 'katolik', 'protestan', 'hindu', 'buddha'])->nullable()->default(null);
            $table->enum('blood_type', ['O', 'A', 'B', 'AB'])->nullable()->default(null);
            $table->string('phone')->nullable()->default(null);
            $table->text('image')->nullable()->default(null);
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
}
