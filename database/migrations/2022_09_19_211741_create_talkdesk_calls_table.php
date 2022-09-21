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
        Schema::create('talkdesk_calls', function (Blueprint $table) {
            $table->id();
            $table->string('interaction_id')->unique();
            $table->string('call_type')->nullable();
            $table->dateTime('start_time')->nullable();
            $table->dateTime('end_time')->nullable();
            $table->string('talkdesk_phone')->nullable();
            $table->string('customer_phone')->nullable();
            $table->string('talk_time')->nullable();
            $table->string('record')->nullable();
            $table->string('wait_time')->nullable();
            $table->string('hold_time')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('phone_display_name')->nullable();
            $table->string('disposition_code')->nullable();
            $table->string('transfer')->nullable();
            $table->unsignedBigInteger('handling_user_id')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('handling_user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('talkdesk_calls');
    }
};
