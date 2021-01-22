<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePromotId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promot_id', function (Blueprint $table) {
            $table->id();
            $table->string("promot_id")->nullable();
            $table->string("watch_time")->nullable();
            $table->string("video_id")->nullable();
            $table->string("done_status")->nullable();
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
        Schema::dropIfExists('promot_id');
    }
}
