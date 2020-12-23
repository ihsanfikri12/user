<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class StubCreateAuthTokensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('auth_tokens', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('key')->unique();
            $table->text('token');
            $table->dateTime('expired_at')->nullable();
            $table->uuid('user_id')->nullable();
            $table->timestamps();
        });

        Schema::create('auth_token_blacklists', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique();
            $table->json('values');
            $table->dateTime('expired_at')->nullable();
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
        Schema::dropIfExists('tokens');
        Schema::dropIfExists('token_blacklists');
    }
}