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
            $table->id()->startingValue(1000000);
            $table->string('username')->unique()->nullable();
            $table->string('email')->unique();
            $table->string('google_id')->nullable();
            $table->string('google_token')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('handphone')->unique()->nullable();
            $table->string('access_pin')->nullable();            
            $table->foreignId('subscription_id')->nullable();
            $table->foreignId('created_by_uid')->nullable();
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
