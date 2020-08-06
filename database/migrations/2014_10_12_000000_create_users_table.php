<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->string('name');
            $table->string('password');
            $table->string('email')->unique();
            $table->string('state')->nullable();
            $table->string('account_type')->nullable();
            $table->string('gender')->nullable();
            $table->string('profile_picture')->default('noimage.jpg');
            $table->integer('balance')->nullable()->default(0.00);
            $table->integer('transfer_code')->nullable();
            $table->string('account_number')->nullable();
            $table->integer('withdrawal')->default(0.00);
            $table->timestamp('email_verified_at')->nullable();
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
